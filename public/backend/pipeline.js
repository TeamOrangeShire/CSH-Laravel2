let table;
let csvData;
const Pipeline = {
    ShowLead: route => {
        $.ajax({
            type: "GET",
            url: route,
            dataType: "json",
            success: res => {
                AsVal('upCompanyName', res.pipeline.pl_company_name);
                AsVal('upName', res.pipeline.pl_name);
                AsVal('upEmail', res.pipeline.pl_email);
                AsVal('upServiceOffer', res.pipeline.pl_service_offer);
                AsVal('upPosition', res.pipeline.pl_position);
                AsVal('upEmployees', res.pipeline.pl_employee);
                AsVal('upStatus', res.pipeline.pl_status);
                AsVal('pl_id', res.pipeline.pl_id);
                AsVal('upEmailStatus', res.pipeline.pl_email_verification);

                if (!$.fn.DataTable.isDataTable('#sentEmail')) {
                    table = $("#sentEmail").DataTable({
                        data: res.email,
                        columns: [
                            { title: "Email Level", data: "se_level" },
                            { title: "Date Sent", data: "se_date" },
                            { title: "Status", data: "se_status" },

                        ],
                        autoWidth: false,

                    });
                } else {
                    table.clear().rows.add(res.email).draw();
                }
            }, error: xhr => {
                console.log(xhr.responseText);
            }
        });
    },
    UpdateLead: (route, load, detail) => {
        document.getElementById('mainLoader').style.display = 'grid';
        $.ajax({
            type: "POST",
            url: route,
            data: $('form#updateLead').serialize(),
            success: res => {
                if (res.status === 'success') {
                    document.getElementById('mainLoader').style.display = 'none';
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.success('Successfully Updated lead');
                    document.getElementById('closeUpdatelead').click();
                    LoadLead(load, detail);
                }
            }, error: xhr => {
                console.log(xhr.responseText);
            }
        });
    },
    DisableLead: (route, load, detail, id) => {
        AsVal('disablePl_id', id);
        alertify.confirm("Remove Lead?", "Are you sure you want to delete this lead?",
            () => {
                document.getElementById('mainLoader').style.display = 'grid';
                $.ajax({
                    type: "POST",
                    url: route,
                    data: $('form#disableForm').serialize(),
                    success: res => {
                        if (res.status === 'success') {
                            document.getElementById('mainLoader').style.display = 'none';
                            alertify.set('notifier', 'position', 'top-center');
                            alertify.success('Successfully Updated lead');
                            document.getElementById('closeUpdatelead').click();
                            LoadLead(load, detail, route);
                        }
                    }, error: xhr => {
                        console.log(xhr.responseText);
                    }
                });
            }, () => console.log('cancel')
        )
    },
    AddLead: (route, load, detail) => {
        if (document.getElementById('companyNameAdd').value == '' && document.getElementById('nameAdd').value == '' && document.getElementById('emailAdd').value == '') {
            alertify.alert('No Data Found', 'Opps.... Please provide altleast one information to proceed');
        } else {
            document.getElementById('mainLoader').style.display = 'grid';

            $.ajax({
                type: "POST",
                url: route,
                data: $('form#addLeadForm').serialize(),
                success: res => {
                    if (res.status === 'success') {
                        document.getElementById('mainLoader').style.display = 'none';
                        alertify.set('notifier', 'position', 'top-center');
                        alertify.success('Successfully added lead');
                        document.getElementById('companyNameAdd').value = '';
                        document.getElementById('nameAdd').value = '';
                        document.getElementById('emailAdd').value = '';
                        $('#sentEmail').DataTable().destroy();
                        document.getElementById('closeAddLead').click();
                        LoadLead(load, detail);
                    }
                }, error: xhr => {
                    console.log(xhr.responseText);
                }
            });
        }
    },
    ReadCSV: route => {
        if (document.getElementById('formFile').files.length == 0) {
            alertify.alert('No File Detected', "Please select a file to proceed on scanning we can't scan a file if you don't select a file for us");
        } else {
            document.getElementById('mainLoader').style.display = 'grid';
            var formData = new FormData($('#scanCSVForm')[0]);
            $.ajax({
                type: "POST",
                url: route,
                data: formData,
                contentType: false,
                processData: false,
                success: res => {
                    if (res.status === 'success') {
                        document.getElementById('mainLoader').style.display = 'none';
                        var saveCSV = new bootstrap.Modal(document.getElementById('saveCSVdata'));
                        document.getElementById('classAddCSV').click();
                        AsText('numOfRows', res.company.length);
                        saveCSV.show();
                        csvData = res;
                    } else {
                        document.getElementById('mainLoader').style.display = 'none';
                        if (!alertify.errorAlert) {
                            alertify.dialog('errorAlert', function factory() {
                                return {
                                    build: function () {
                                        var errorHeader = '<span class="icon-warning fs-3" '
                                            + 'style="vertical-align:middle;color:#e10000;">'
                                            + '</span> CSV Reading Error';
                                        this.setHeader(errorHeader);
                                    }
                                };
                            }, true, 'alert');
                        }

                        alertify
                            .errorAlert("One of the columns you defined is not found in your CSV please recheck it and try again ");
                    }

                }, error: xhr => {
                    console.log(xhr.responseText);
                }
            });
        }
    }, SaveCSVData: (route, load, getDetail, disable) => {
        const length = csvData.company.length;
        const each = (1 / length) * 100;
        const progressBar = document.getElementById('progressBar');
        const progressStatus = document.getElementById('progressStatus');
        const totalData = document.getElementById('totalData');
        const savedData = document.getElementById('savedData');


        for (let i = 0; i < length; i++) {
            AsVal('companyNameAdd', csvData.company[i]);
            AsVal('nameAdd', csvData.name[i]);
            AsVal('emailAdd', csvData.email[i]);
            const percentInit = (i + 1) * each;
            const percent = percentInit.toFixed(2);
            $.ajax({
                type: "POST",
                url: route,
                data: $('form#addLeadForm').serialize(),
                success: res => {
                    if (res.status === 'success') {
                        progressBar.style.width = percent + "%";
                        progressStatus.textContent = percent;
                        totalData.textContent = length;
                        savedData.textContent = i + 1;
                        if (percent > 99) {
                            document.getElementById('savingLeadsTitle').textContent = 'DONE!!'
                            document.getElementById('doneButton').style.display = 'flex';
                        }

                    }
                }, error: xhr => {
                    console.log(xhr.responseText);
                }
            })
        }
        LoadLead(load, getDetail, disable);

    }, UpdateSMTPConfig: route => {
        let validity = 0;

        validity += Support.CheckError('mailAddress', 'mailAddressE');
        validity += Support.CheckError('mailPassword', 'mailPasswordE');
        validity += Support.CheckError('smtpHost', 'smtpHostE');
        validity += Support.CheckError('smtpPort', 'smtpPortE');
        validity += Support.CheckError('smtpEncrypt', 'smtpEncryptE');

        if (validity === 5) {
            document.getElementById('mainLoader').style.display = 'grid';

            $.ajax({
                type: "POST",
                url: route,
                data: $('form#smtpConfig').serialize(),
                success: res => {
                    if (res.status === 'success') {
                        document.getElementById('mainLoader').style.display = 'none';
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success('SMTP Config is updated')
                    }
                }, error: xhr => {
                    console.log(xhr.responseText);
                }
            })
        }
    }, SaveEmailTemp: (route, type) => {
        let notify = '';
        if (type === 'signature') {
            if (Support.CheckError('sigName', 'sigNameE') === 1) {
                Support.OpenDiv('mainLoader', 'grid');
                AsVal('tempSigName', document.getElementById('sigName').value);
                AsVal('tempSigContent', $('#emailSignatureEditor').summernote('code'));
                AsVal('tempSigType', 'signature');
                notify = 'Successfully Added a email signature';
            }
        } else {
            if (Support.CheckError('tempName', 'tempNameE') === 1) {
                Support.OpenDiv('mainLoader', 'grid');
                AsVal('tempSigName', document.getElementById('tempName').value);
                AsVal('tempSigContent', $('#emailTemplateEditor').summernote('code'));
                AsVal('tempSigType', 'template');
                notify = 'Successfully Added a email template';
            }
        }

        $.ajax({
            type: "POST",
            url: route,
            data: $('form#emailTempSig').serialize(),
            success: res => {
                if (res.status === 'success') {
                    Support.CloseDiv('mainLoader');
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(notify)
                }
            }, error: xhr => {
                console.log(xhr.responseText);
            }
        })
    }, LoadTempSig: (route, type) => {
        if (type === 'signature') {
            $.ajax({
                type: "GET",
                url: route,
                dataType: "json",
                success: res => {
                    const list = document.getElementById('emailSignatureList');
                    list.innerHTML = '';
                    console.log(res.data);
                    res.data.forEach(e => {
                        list.innerHTML += `<li
                                            class="list-group-item d-flex justify-content-between align-items-center">
                                                ${e.emsig_name}
                                            <div class="d-flex gap-2">
                                            <button data-bs-toggle="modal" 
                                            onclick="EditTempSig('signature', '${e.emsig_id}', '#emailSignatureEditor')" 
                                            data-bs-target="#addEmailSignature" class="btn btn-outline-primary"><i
                                            class="icon-edit"></i> Edit</button>
                                            <button class="btn btn-outline-info"><i
                                            class="icon-eye"></i> View</button>
                                            <button class="btn btn-outline-danger"><i
                                            class="icon-trash"></i> Delete</button>
                                            </div>
                                            </li>`;
                    });
                }, error: xhr => {
                    console.log(xhr.responseText);
                }
            })
        } else {
            $.ajax({
                type: "GET",
                url: route,
                dataType: "json",
                success: res => {
                    const list = document.getElementById('emailTemplateList');
                    list.innerHTML = '';
                    console.log(res.data);
                    res.data.forEach(e => {
                        list.innerHTML += `<li
                                            class="list-group-item d-flex justify-content-between align-items-center">
                                                    ${e.emtemp_name}
                                            <div class="d-flex gap-2">
                                            <button data-bs-toggle="modal" 
                                            data-bs-target="#addEmailTemplate" 
                                            onclick="EditTempSig('template', '${e.emtemp_id}', '#emailTemplateEditor')" 
                                            class="btn btn-outline-primary"><i
                                            class="icon-edit"></i> Edit</button>
                                            <button class="btn btn-outline-info"><i
                                            class="icon-eye"></i> View</button>
                                            <button class="btn btn-outline-danger"><i
                                            class="icon-trash"></i> Delete</button>
                                            </div>
                                            </li>`;
                    });
                }, error: xhr => {
                    console.log(xhr.responseText);
                }
            })
        }
    }, UpdateEmailTempSig: (route, type) => {
        
        if(type === 'signature'){
            if(Support.CheckError('sigName', 'sigNameE')===1){
                AsVal('tempSigNameUpdate', document.getElementById('sigName').value);
                AsVal('tempSigContentUpdate', $('#emailSignatureEditor').summernote('code'));
                AsVal('tempSigTypeUpdate', 'signature');
            }
        }else{
            if(Support.CheckError('tempName', 'tempNameE')===1){
                AsVal('tempSigNameUpdate', document.getElementById('tempName').value);
                AsVal('tempSigContentUpdate', $('#emailSignatureEditor').summernote('code'));
                AsVal('tempSigTypeUpdate', 'signature');
            }
        }
    }

}

function AsVal(id, value) {
    document.getElementById(id).value = value;
}
function AsText(id, value) {
    document.getElementById(id).textContent = value;
}
let tables;
function LoadLead(route, getDetail, disable) {
    $.ajax({
        type: "GET",
        url: route,
        dataType: "json",
        success: res => {
            if (!$.fn.DataTable.isDataTable('#pipeline')) {
                tables = $('#pipeline').DataTable({
                    data: res.data,
                    columns: [
                        { title: "Company Name", data: "pl_company_name" },
                        { title: "Contact Name", data: "pl_name" },
                        { title: "Email", data: "pl_email" },
                        { title: "Service Offer", data: "pl_service_offer" },
                        { title: "No. Employees", data: "pl_employee" },
                        { title: "Position", data: "pl_position" },
                        {
                            title: "Status",
                            data: null,
                            render: data => {
                                return `<span class="badge fs-6 bg-${Support.CheckStatus(data.pl_status)}">${data.pl_status}</span>`
                            }
                        },
                        { title: "Email Status", data: "pl_position" },
                        {
                            title: "Actions",
                            data: null,
                            render: function (data, type, row) {
                                return `
                         <button onclick="Pipeline.ShowLead('${getDetail}?pl_id=${data.pl_id}')" data-bs-toggle="modal" data-bs-target="#updateLead" class="btn btn-outline-primary btn-sm" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-custom-class="custom-tooltip-primary"
                            data-bs-title="Edit">
                            <i class="icon-check-circle"></i>
                        </button>

                        <button onclick="Pipeline.DisableLead('${disable}', '${route}','${getDetail}', '${data.pl_id}')" class="btn btn-outline-danger btn-sm" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-custom-class="custom-tooltip-danger"
                            data-bs-title="Delete">
                            <i class="icon-trash"></i>
                        </button>
                        `;
                            },
                            orderable: false
                        }
                    ],
                    autoWidth: false
                });
            } else {
                tables.clear().rows.add(res.data).draw();
            }

        }, error: xhr => {
            console.log(xhr.responseText);
        }
    });
}

$(document).ready(function () {
    $('#emailSignatureEditor').summernote({
        placeholder: 'Edit your email Signature here',
        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor    
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link', 'picture', 'table', 'hr']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ]
    });
    $('#emailTemplateEditor').summernote({
        placeholder: 'Edit your email template here',
        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of edit
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link', 'picture', 'table', 'hr']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ]
    });
});

function EditTempSig(type, id, editor){
    const route = document.getElementById('getTempSigRoute').value + "?sigTemp=" + id + "&type=" + type;
    
    $.ajax({
        type: "GET",
        url: route,
        dataType: 'json',
        success: res=>{
            if(type === 'signature'){
                Support.OpenDiv('updateEmailSigButton', '');
                Support.CloseDiv('saveEmailSigButton');
                document.getElementById('sigName').value = res.data.emsig_name;
                $(editor).summernote('pasteHTML', '<pre><code>' + res.data.emsig_content + '</code></pre>');
                document.getElementById('sigTempId').value = res.data.emsig_id;
            }else{
                Support.OpenDiv('updateEmailTempButton', '');
                Support.CloseDiv('saveEmailTempButton');
                document.getElementById('tempName').value = res.data.emtemp_name;
                $(editor).summernote('pasteHTML', '<pre><code>' + res.data.emtemp_content + '</code></pre>');
                document.getElementById('sigTempId').value = res.data.emtemp_id;
            }
        }, error: xhr => {
            console.log(xhr.responseText);
        }
    })
}
