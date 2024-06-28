let table;
let tablesSubject;
let csvData;
let mailLevels;
const Pipeline = {
    ShowLead: route => {
        $.ajax({
            type: "GET",
            url: route,
            dataType: "json",
            success: res => {
                Support.AsVal('upCompanyName', res.pipeline.pl_company_name);
                Support.AsVal('upName', res.pipeline.pl_name);
                Support.AsVal('upEmail', res.pipeline.pl_email);
                Support.AsVal('upServiceOffer', res.pipeline.pl_service_offer);
                Support.AsVal('upPosition', res.pipeline.pl_position);
                Support.AsVal('upEmployees', res.pipeline.pl_employee);
                Support.AsVal('upStatus', res.pipeline.pl_status);
                Support.AsVal('pl_id', res.pipeline.pl_id);
                Support.AsVal('upEmailStatus', res.pipeline.pl_email_verification);

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
    UpdateLead: (route, load, detail, disable, level) => {
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
                    LoadLead(load, detail, disable, level);
                }
            }, error: xhr => {
                console.log(xhr.responseText);
            }
        });
    },
    DisableLead: (route, load, detail, id, level) => {
        Support.AsVal('disablePl_id', id);
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
                            LoadLead(load, detail, route, level);
                        }
                    }, error: xhr => {
                        console.log(xhr.responseText);
                    }
                });
            }, () => console.log('cancel')
        )
    },
    AddLead: (route, load, detail, disable, level) => {
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
                        LoadLead(load, detail, disable, level);
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
                        Support.AsText('numOfRows', res.company.length);
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
    }, SaveCSVData: async (route, load, getDetail, disable, level) => {
        const length = csvData.company.length;
        const each = (1 / length) * 100;
        const progressBar = document.getElementById('progressBar');
        const progressStatus = document.getElementById('progressStatus');
        const totalData = document.getElementById('totalData');
        const savedData = document.getElementById('savedData');

        for (let i = 0; i < length; i++) {
            Support.AsVal('companyNameAdd', csvData.company[i]);
            Support.AsVal('nameAdd', csvData.name[i]);
            Support.AsVal('emailAdd', csvData.email[i]);

            const percentInit = (i + 1) * each;
            const percent = percentInit.toFixed(2);

            try {
                const res = await $.ajax({
                    type: "POST",
                    url: route,
                    data: $('form#addLeadForm').serialize(),
                });

                if (res.status === 'success') {
                    progressBar.style.width = percent + "%";
                    progressStatus.textContent = percent;
                    totalData.textContent = length;
                    savedData.textContent = i + 1;

                    if (percent > 99.9999999) {
                        document.getElementById('savingLeadsTitle').textContent = 'DONE!!';
                        document.getElementById('doneButton').style.display = 'flex';
                    }
                }
            } catch (error) {
                console.error(error.responseText);
            }

            // Delay before the next request
            await new Promise(resolve => setTimeout(resolve, 750));
        }

        LoadLead(load, getDetail, disable, level);
    }, UpdateSMTPConfig: route => {
        let validity = 0;

        validity += Support.CheckError('mailAddress', 'mailAddressE');
        validity += Support.CheckError('mailPassword', 'mailPasswordE');
        validity += Support.CheckError('smtpHost', 'smtpHostE');
        validity += Support.CheckError('smtpPort', 'smtpPortE');
        validity += Support.CheckError('smtpEncrypt', 'smtpEncryptE');
        validity += Support.CheckError('fromAddress', 'fromAddressE');

        if (validity === 6) {
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
    }, SaveEmailTemp: (route, type, load, dis) => {
        let notify = '';
        if (type === 'signature') {
            if (Support.CheckError('sigName', 'sigNameE') === 1) {
                Support.OpenDiv('mainLoader', 'grid');
                Support.AsVal('tempSigName', document.getElementById('sigName').value);
                Support.AsVal('tempSigContent', $('#emailSignatureEditor').summernote('code'));
                Support.AsVal('tempSigType', 'signature');
                notify = 'Successfully Added a email signature';
                var closeBtn = 'closeUpdateSigButton';
            }
        } else {
            if (Support.CheckError('tempName', 'tempNameE') === 1) {
                Support.OpenDiv('mainLoader', 'grid');
                Support.AsVal('tempSigName', document.getElementById('tempName').value);
                Support.AsVal('tempSigContent', $('#emailTemplateEditor').summernote('code'));
                Support.AsVal('tempSigType', 'template');
                notify = 'Successfully Added a email template';
                var closeBtn = 'closeUpdateTempButton';
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
                    alertify.success(notify);
                    Pipeline.LoadTempSig(load, type, dis);
                    document.getElementById(closeBtn).click();
                }
            }, error: xhr => {
                console.log(xhr.responseText);
            }
        })
    }, LoadTempSig: (route, type, dis) => {
        if (type === 'signature') {
            $.ajax({
                type: "GET",
                url: route,
                dataType: "json",
                success: res => {
                    const list = document.getElementById('emailSignatureList');
                    list.innerHTML = '';
                    res.data.forEach(e => {
                        list.innerHTML += `<li
                                            class="list-group-item d-flex justify-content-between align-items-center">
                                                ${e.emsig_name}
                                            <div class="d-flex gap-2 align-items-center">
                                            ${e.emsig_status === 2 ? `<span class="badge rounded-pill bg-success p-2">Active</span>` : ''}
                                            <button data-bs-toggle="modal" 
                                            onclick="EditTempSig('signature', '${e.emsig_id}', '#emailSignatureEditor', '${route}', '${dis}')" 
                                            data-bs-target="#addEmailSignature" class="btn btn-outline-primary"><i
                                            class="icon-edit"></i> Edit</button>
                                       
                                            <button  onclick="Pipeline.DisableTempSig('${dis}', '${e.emsig_id}', 'signature', '${route}')" class="btn btn-outline-danger"><i
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
                                           
                                            <button onclick="Pipeline.DisableTempSig('${dis}', '${e.emtemp_id}', 'template', 'na', 'na')" class="btn btn-outline-danger"><i
                                            class="icon-trash"></i> Delete</button>
                                            </div>
                                            </li>`;
                    });
                }, error: xhr => {
                    console.log(xhr.responseText);
                }
            })
        }
    }, UpdateEmailTempSig: (route, type, load, dis) => {
        Support.AsVal('tempSigTypeUpdate', type);
        if (type === 'signature') {
            if (Support.CheckError('sigName', 'sigNameE') === 1) {
                Support.AsVal('tempSigNameUpdate', document.getElementById('sigName').value);
                Support.AsVal('tempSigContentUpdate', $('#emailSignatureEditor').summernote('code'));
                var notif = 'Email Signature is successfully updated';
                var close = 'closeUpdateTempButton';
            }
        } else {
            if (Support.CheckError('tempName', 'tempNameE') === 1) {
                Support.AsVal('tempSigNameUpdate', document.getElementById('tempName').value);
                Support.AsVal('tempSigContentUpdate', $('#emailTemplateEditor').summernote('code'));
                var notif = 'Email Template is successfully updated';
                var close = 'closeUpdateTempButton';
            }
        }

        Support.OpenDiv('mainLoader', 'grid');

        $.ajax({
            type: "POST",
            url: route,
            data: $('form#emailTempSigUpdate').serialize(),
            success: res => {
                if (res.status === 'success') {
                    Support.CloseDiv('mainLoader');
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(notif);
                    document.getElementById(close).click();
                    Pipeline.LoadTempSig(load, type, dis);
                }
            }, error: xhr => console.log(xhr.responseText)
        })
    }, DisableTempSig: (route, id, type, load) => {
        alertify.confirm('Confirm Delete', `Are you sure do you want to delete this ${type}?`,
            () => {
                Support.AsVal('disEmTempSigId', id);
                Support.AsVal('disEmTempSigType', type);

                Support.OpenDiv('mainLoader', 'grid');

                $.ajax({
                    type: "POST",
                    url: route,
                    data: $('form#disableEmTempSig').serialize(),
                    success: res => {
                        if (res.status === 'success') {
                            Support.CloseDiv('mainLoader');
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.error(`${type} is successfully deleted`);
                            Pipeline.LoadTempSig(load, type, route)
                        }
                    }, error: xhr => console.log(xhr),
                });
            }, () => console.log('cancel')
        )
    }, SwitchToActiveSig: (route, load, dis) => {
        alertify.confirm("Switch Active Signature", "Are you sure do you want to switch to this email signature?",
            () => {
                Support.OpenDiv('mainLoader', 'grid');
                $.ajax({
                    type: "POST",
                    url: route,
                    data: $('form#switchToActiveForm').serialize(),
                    success: res => {
                        if (res.status === 'success') {
                            Support.CloseDiv('mainLoader');
                            Pipeline.LoadTempSig(load, 'signature', dis);
                            document.getElementById('closeUpdateSigButton').click();
                        }
                    }, error: xhr => console.log(xhr.responseText),
                });
            },
            () => console.log('cancel'),
        )
    }, LoadActiveSignature: route => {
        $('#sendCustomMessageBox').summernote('code', '');
        $.ajax({
            type: "GET",
            url: route,
            dataType: "json",
            success: res => {
                if (res.status === 'success') {
                    $('#sendCustomMessageBox').summernote('pasteHTML', '<pre><code><br><br>' + res.data.emsig_content + '</code></pre>');
                }
            }, error: xhr => console.log(xhr.responseText),
        })
    }, SendCustomEmail: route => {
        Support.OpenDiv('mainLoader', 'grid');
        Support.AsVal('inputHiddenMessage', $('#sendCustomMessageBox').summernote('code'));
        $.ajax({
            type: "POST",
            url: route,
            data: $('form#sendCustomMail').serialize(),
            success: res => {
                if (res.status === 'success') {
                    Support.CloseDiv('mainLoader');
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success('Message Sent');
                }
            }, error: xhr => console.log(xhr.responseText),
        })
    }, FilterMassMail: (route, user, filter, subject, subdis) => {
        const fil = `${route}?user_id=${user}&filter=${filter.value}`;
        const sub = `${subject}?user_id=${user}&filter=${filter.value}`;
        LoadLeadMassEmail(fil);
        Pipeline.LoadEmailSubject(sub, subdis);
    }, AddEmailSubject: (route, load) => {
        if (Support.CheckError('addEmailSubjectContent', 'addEmailSubjectContentE') === 1) {
            Support.OpenDiv('mainLoader', 'grid');

            $.ajax({
                type: "POST",
                url: route,
                data: $('form#addEmailSubject').serialize(),
                success: res => {
                    if (res.status === 'success') {
                        Support.CloseDiv('mainLoader');
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success('Successfully Added Email Subject');

                        document.getElementById('addEmailSubjectContent').value = '';
                        document.getElementById('affiliatedServiceAdd').value = 'None';
                        Pipeline.LoadEmailSubject(load);
                    }
                }, error: xhr => console.log(xhr.responseText),
            });
        }
    }, GetEmailSubject: (id, content, affiliate) => {
        Support.AsVal('updateEmsubId', id);
        Support.AsVal('updateEmailSubjectContent', content);
        Support.AsVal('updateaffiliatedServiceAdd', affiliate);
    }, UpdateEmailSubject: (route, load, disable) => {
        if (Support.CheckError('updateEmailSubjectContent', 'updateEmailSubjectContentE') === 1) {
            Support.OpenDiv('mainLoader', 'grid');

            $.ajax({
                type: "POST",
                url: route,
                data: $('form#updateEmailSubject').serialize(),
                success: res => {
                    if (res.status === 'success') {
                        Support.CloseDiv('mainLoader');
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success('Successfully Added Email Subject');
                        document.getElementById('closeUpdateEmailSubject').click();
                        Pipeline.LoadEmailSubject(load, disable);
                    }
                }, error: xhr => console.log(xhr.responseText),
            });
        }
    },
    DisableEmailSubject: (route, load, id) => {
        Support.AsVal('disableEmsubId', id);
        alertify.confirm("Delete Subject", "Are you sure do you want to delete this email subject?",
            () => {
                Support.OpenDiv('mainLoader', 'grid');
                $.ajax({
                    type: "POST",
                    url: route,
                    data: $('form#disableEmailSubject').serialize(),
                    success: res => {
                        if (res.status === 'success') {
                            Support.CloseDiv('mainLoader');
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.success('Successfully Deleted Email Subject');
                            Pipeline.LoadEmailSubject(load, route);
                        }
                    }, error: xhr => console.log(xhr.responseText),
                });
            }, () => console.log('cancel'));
    },
    LoadEmailSubject: (route, disable) => {
        $.ajax({
            type: "GET",
            url: route,
            dataType: "json",
            success: res => {
                const list = document.getElementById('selectMassSubject');
                res.status === 'all' ? list.innerHTML = ` <option value="none" disabled selected> -------Select Subject------- </option>` : list.innerHTML = '';
                res.data.forEach(e => {
                    list.innerHTML += `<option value="${e.emsub_id}">
                    <p>${e.emsub_content.length > 25 ? e.emsub_content.substring(0, 25) + '.....' : e.emsub_content} (<span class="text-muted">${e.emsub_service}</span>)</p></option>`
                })
                if (!$.fn.DataTable.isDataTable('#subjectListDataTable')) {
                    tablesSubject = $('#subjectListDataTable').DataTable({
                        data: res.data,
                        columns: [
                            { title: "Subject Content", data: "emsub_content" },
                            { title: "Affiliated Service", data: "emsub_service" },
                            {
                                title: "Actions",
                                data: null,
                                render: function (data, type, row) {
                                    return `
                             <button onclick="Pipeline.GetEmailSubject('${data.emsub_id}', '${data.emsub_content}', '${data.emsub_service}')" data-bs-toggle="modal" data-bs-target="#updateEmailSubject" class="btn btn-outline-primary btn-sm" data-bs-toggle="tooltip"
                                data-bs-placement="top" data-bs-custom-class="custom-tooltip-primary"
                                data-bs-title="Edit">
                                <i class="icon-check-circle"></i>
                            </button>
    
                            <button onclick="Pipeline.DisableEmailSubject('${disable}', '${route}', '${data.emsub_id}')" class="btn btn-outline-danger btn-sm" data-bs-toggle="tooltip"
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
                    tablesSubject.clear().rows.add(res.data).draw();
                }

            }, error: xhr => {
                console.log(xhr.responseText);
            }
        });

    },
    SendMultipleEmail: (route, load, validity) => {
        var checkboxes = document.querySelectorAll('input[name="selectedLeads[]"]');
        var checkedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);
        var count = checkedCheckboxes.length;
        const temp = document.getElementById('selectMassTemplate');

        if (count === 0 || temp.value === 'none') {
            alertify.alert('Failed to proccess', 'No Selected Template or Leads please complete the details before proceeding');
        } else {
            alertify.confirm('labels changed!').set('labels', { ok: 'Proceeed!', cancel: 'Wait lemme Check!' });
            alertify.confirm(`Send ${count} Mail`, "Do you confirm that the settings you set are all correct? Please review it before proceeding..",
                async () => {
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.message('Please Wait...');
                    const allEmailsValid = await Pipeline.CheckMultipleEmailValidity(validity, document.getElementById('selectServiceOfferMassMail').value);
                    if (allEmailsValid && document.getElementById('selectServiceOfferMassMail').value != 'all') {
                        document.getElementById('closeSendMail').click();
                        Support.OpenDiv('mainLoader', 'grid');
                        let ready = 1;
                        const list = document.getElementById('progressQueueMailList');
                        document.getElementById('massMailProgressBar').style.width = "0%";
                        list.innerHTML = '';
                        checkedCheckboxes.forEach(e => {
                            $.ajax({
                                type: "GET",
                                url: `${load}?pl_id=${e.value}`,
                                dataType: "json",
                                success: res => {
                                    list.innerHTML += ` <li id='mailQueueList${res.pipeline.pl_id}' class="list-group-item d-flex justify-content-between align-items-center">
                                ${res.pipeline.pl_name} (${res.pipeline.pl_company_name})
                            <div class="loaderMailQueue">
                                    <div class="bar1"></div>
                                    <div class="bar2"></div>
                                    <div class="bar3"></div>
                                    <div class="bar4"></div>
                                    <div class="bar5"></div>
                                    <div class="bar6"></div>
                                    <div class="bar7"></div>
                                    <div class="bar8"></div>
                                    <div class="bar9"></div>
                                    <div class="bar10"></div>
                                    <div class="bar11"></div>
                                    <div class="bar12"></div>
                                </div>
                            </li>`;

                                    if (ready === checkedCheckboxes.length) {
                                        Support.CloseDiv('mainLoader');
                                        Support.OpenDiv('progressEmailQueue', 'grid');
                                        document.getElementById('loaderMailQueueID').innerHTML = `<div class="bar1"></div>
                                    <div class="bar2"></div>
                                    <div class="bar3"></div>
                                    <div class="bar4"></div>
                                    <div class="bar5"></div>
                                    <div class="bar6"></div>
                                    <div class="bar7"></div>
                                    <div class="bar8"></div>
                                    <div class="bar9"></div>
                                    <div class="bar10"></div>
                                    <div class="bar11"></div>
                                    <div class="bar12"></div>`;
                                        document.getElementById('loaderMailQueueID2').innerHTML = `<div class="bar1"></div>
                                    <div class="bar2"></div>
                                    <div class="bar3"></div>
                                    <div class="bar4"></div>
                                    <div class="bar5"></div>
                                    <div class="bar6"></div>
                                    <div class="bar7"></div>
                                    <div class="bar8"></div>
                                    <div class="bar9"></div>
                                    <div class="bar10"></div>
                                    <div class="bar11"></div>
                                    <div class="bar12"></div>`;
                                        const each = 100 / checkedCheckboxes.length;
                                        document.getElementById('progressTotalMail').textContent = checkedCheckboxes.length;
                                        document.getElementById('minimizeProgressTotalMail').textContent = checkedCheckboxes.length;

                                        var stat = 0;
                                        let success = 0;
                                        checkedCheckboxes.forEach(e => {
                                            Support.AsVal('sendMultpleMailPLID', e.value);
                                            Support.AsVal('sendMultpleMailTempId', document.getElementById('selectMassTemplate').value);
                                            Support.AsVal('sendMultpleMailSubjectId', document.getElementById('selectMassSubject').value);

                                            $.ajax({
                                                type: "POST",
                                                url: route,
                                                data: $('form#sendMultipleMailQueue').serialize(),
                                                success: res => {
                                                    stat++;
                                                    const percent = stat * each;
                                                    if (res.status === 'success') {
                                                        success++;
                                                        document.getElementById('massMailProgressPercentage').textContent = percent.toFixed(2);
                                                        document.getElementById('massMailProgressBar').style.width = percent + "%";
                                                        document.getElementById('progressSentMail').textContent = stat;
                                                        document.getElementById('minimizeProgressSentMail').textContent = stat;
                                                        const li = document.getElementById(`mailQueueList${e.value}`);
                                                        const child = li.querySelector('.loaderMailQueue');
                                                        child.remove();
                                                        li.innerHTML += '<i class="text-success icon-check-circle"></i>';

                                                        if (stat === checkedCheckboxes.length) {
                                                            document.getElementById('loaderMailQueueID').innerHTML = '<i class="text-success icon-check-circle"></i>';
                                                            document.getElementById('loaderMailQueueID2').innerHTML = '<i class="text-success icon-check-circle"></i>';
                                                            Support.OpenDiv('closeMinimizeProgressMailButton', '');
                                                            Support.OpenDiv('closeProgressMailButton', '');
                                                            Support.CloseDiv('minimizeProgressMailButton');
                                                            Support.CloseDiv('maximizeProgressMailButton');
                                                        }
                                                    } else {
                                                        const li = document.getElementById(`mailQueueList${e.value}`);
                                                        const child = li.querySelector('.loaderMailQueue');

                                                        child.innerHTML = `<div class="d-flex gap-4">
                                        <p class="text-danger">Failed</p><button class="border-0 bg-transparent" 
                                        onclick="Pipeline.Resend('${route}','${e.value}', '${document.getElementById('selectMassTemplate').value}', '${document.getElementById('selectMassSubject').value}','${each}', '${success}')"><i class="text-danger icon-replay"></i></button>
                                        </div>`;
                                                    }
                                                }, error: xhr => console.log(xhr.responseText),
                                            });


                                        });
                                    }
                                    ready++;
                                }, error: xhr => console.log(xhr.responseText)
                            });
                        });
                    } else {
                        alertify.alert('Error: Check the service offer', 'Please make sure you are offering the same service on all your selected leads and make sure the filter is not set to all');
                    }

                }, () => console.log('cancel')
            );
        }
    }, Resend: (route, pl_id, temp, sub, each, stat) => {
        Support.AsVal('sendMultpleMailPLID', pl_id);
        Support.AsVal('sendMultpleMailTempId', temp);
        Support.AsVal('sendMultpleMailSubjectId', sub);
        const percent = each * stat;

        document.getElementById('massMailProgressPercentage').textContent = percent.toFixed(2);
        document.getElementById('massMailProgressBar').style.width = percent + "%";
        document.getElementById('progressSentMail').textContent = stat;
        document.getElementById('minimizeProgressSentMail').textContent = stat;

        const li = document.getElementById(`mailQueueList${pl_id}`);
        const child = li.querySelector('.loaderMailQueue');
        child.innerHTML = `<div class="bar1"></div>
                                    <div class="bar2"></div>
                                    <div class="bar3"></div>
                                    <div class="bar4"></div>
                                    <div class="bar5"></div>
                                    <div class="bar6"></div>
                                    <div class="bar7"></div>
                                    <div class="bar8"></div>
                                    <div class="bar9"></div>
                                    <div class="bar10"></div>
                                    <div class="bar11"></div>
                                    <div class="bar12"></div>`;
        $.ajax({
            type: "POST",
            url: route,
            data: $('form#sendMultipleMailQueue').serialize(),
            success: res => {
                if (res.status === 'success') {
                    const li = document.getElementById(`mailQueueList${pl_id}`);
                    const child = li.querySelector('.loaderMailQueue');
                    child.remove();
                    li.innerHTML += '<i class="text-success icon-check-circle"></i>';
                }
            }, error: xhr => console.log(xhr.responseText)
        })
    }, ShowMailProgress: (route, id) => {
        const load = `${route}?pl_id=${id}`;

        $.ajax({
            type: "GET",
            url: load,
            dataType: "json",
            success: res => {
                const data = res.schedule;
                const list = document.getElementById('MailLevelProgressTable');
                list.innerHTML = `<tr>
						           <td>1</td>
									<td>${data.ml_date_one}</td>
									<td>${data.status1}</td>
									<td>${data.view1}</td>
										</tr>
                                        <tr>
						           <td>2</td>
									<td>${data.ml_date_two}</td>
									<td>${data.status2}</td>
									<td>${data.view2}</td>
										</tr>
                                        <tr>
						           <td>3</td>
									<td>${data.ml_date_three}</td>
									<td>${data.status3}</td>
									<td>${data.view3}</td>
										</tr>
                                        <tr>
						           <td>4</td>
									<td>${data.ml_date_four}</td>
									<td>${data.status4}</td>
									<td>${data.view4}</td>
										</tr>
                                        <tr>
						           <td>5</td>
									<td>${data.ml_date_five}</td>
									<td>${data.status5}</td>
									<td>${data.view5}</td>
										</tr>`;

            }, error: xhr => {
                console.log(xhr.responseText);
            }
        });
    },
    CheckMultipleEmailValidity: async (route, offer) => {
        var checkboxes = document.querySelectorAll('input[name="selectedLeads[]"]');
        var checkedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);

        let validity = 0;

        const promises = checkedCheckboxes.map(e => {
            return new Promise((resolve, reject) => {
                $.ajax({
                    type: "GET",
                    url: `${route}?pl_id=${e.value}&offer=${offer}`,
                    dataType: "json",
                    success: res => {
                        if (res.status === 'success') {
                            validity++;
                        }
                        resolve();
                    },
                    error: xhr => {
                        console.log(xhr.responseText);
                        reject();
                    }
                });
            });
        });
        try {
            await Promise.all(promises);
            return validity === checkedCheckboxes.length;
        } catch (error) {
            console.error("Error in validating emails", error);
            return false;
        }

    }

}
let tables;
let tablesMass;
function LoadLead(route, getDetail, disable, level) {
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
                        {
                            title: "Email Status", data: null,
                            render: data => {
                                return `<button onclick="Pipeline.ShowMailProgress('${level}', '${data.pl_id}')" data-bs-toggle="modal" data-bs-target="#MailLevelProgress" class="btn btn-outline-${Support.Order(data.email_num, 'button')} w-100">${Support.Order(data.email_num, 'text')}</button>`;
                            }
                        },
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

                        <button onclick="Pipeline.DisableLead('${disable}', '${route}','${getDetail}', '${data.pl_id}', '${level}')" class="btn btn-outline-danger btn-sm" data-bs-toggle="tooltip"
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
function LoadLeadMassEmail(route) {
    $.ajax({
        type: "GET",
        url: route,
        dataType: "json",
        success: res => {
            if (!$.fn.DataTable.isDataTable('#massEmailLeads')) {
                tablesMass = $('#massEmailLeads').DataTable({
                    data: res.data,
                    columns: [
                        {
                            title: `<input type='checkbox' onclick="Support.SelectAll(this, '.allLeadsEmail')" id='selectAll' class='form-check-input'>`,
                            data: null,
                            render: data => {
                                return `<input type="checkbox" onchange="Support.UpdateSelectedLeads('selectedLeads[]', this)" name="selectedLeads[]" class="form-check-input allLeadsEmail" value="${data.pl_id}">`
                            }
                        },
                        { title: "Company", data: "pl_company_name" },
                        { title: "Name", data: "pl_name" },
                        { title: "Email", data: "pl_email" },
                        { title: "Service Offer", data: "pl_service_offer" },

                    ],
                    autoWidth: false,

                });
            } else {
                tablesMass.clear().rows.add(res.data).draw();
            }

        }, error: xhr => {
            console.log(xhr.responseText);
        }
    });
}

$(document).ready(function () {
    $('#emailSignatureEditor').summernote({
        placeholder: 'Edit your email Signature here',
        height: 300,              // set editor height
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
        height: 300,
        tabsize: 2,     // set editor height
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

    $('#sendCustomMessageBox').summernote({
        placeholder: 'Compose a message',
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

function EditTempSig(type, id, editor) {
    const route = document.getElementById('getTempSigRoute').value + "?sigTemp=" + id + "&type=" + type;

    $.ajax({
        type: "GET",
        url: route,
        dataType: 'json',
        success: res => {
            $(editor).summernote('code', '');
            if (type === 'signature') {
                const status = document.getElementById('activeStatusSignature');
                status.style.display = '';
                if (res.data.emsig_status === 2) {
                    status.disabled = true;
                    status.classList.add('btn-outline-success');
                    status.classList.remove('btn-outline-danger');
                    status.textContent = 'Active';
                } else {
                    status.disabled = false;
                    status.classList.remove('btn-outline-success');
                    status.classList.add('btn-outline-danger');
                    status.textContent = 'Not Active';
                    document.getElementById('switchToActiveId').value = res.data.emsig_id;
                }
                Support.AsText('updateSignatureHeader', 'Update Signature');
                Support.OpenDiv('updateEmailSigButton', '');
                Support.CloseDiv('saveEmailSigButton');
                document.getElementById('sigName').value = res.data.emsig_name;
                $(editor).summernote('pasteHTML', '<pre><code>' + res.data.emsig_content + '</code></pre>');
                document.getElementById('sigTempIdUpdate').value = res.data.emsig_id;
            } else {
                Support.AsText('updateTemplateHeader', 'Update Template');
                Support.OpenDiv('updateEmailTempButton', '');
                Support.CloseDiv('saveEmailTempButton');
                document.getElementById('tempName').value = res.data.emtemp_name;
                $(editor).summernote('pasteHTML', '<pre><code>' + res.data.emtemp_content + '</code></pre>');
                document.getElementById('sigTempIdUpdate').value = res.data.emtemp_id;
            }
        }, error: xhr => {
            console.log(xhr.responseText);
        }
    })
}
