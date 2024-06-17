let table;
let csvData;
const Pipeline = {
    ShowLead: route => {
      $.ajax({
        type: "GET",
        url: route,
        dataType: "json",
        success: res=>{
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
        }, error: xhr=>{
            console.log(xhr.responseText);
        }
      });
    }, 
    UpdateLead: (route, load, detail) =>{
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
    DisableLead: (route, load, detail, id)=>{
        AsVal('disablePl_id', id);
        alertify.confirm("Remove Lead?", "Are you sure you want to delete this lead?",
            ()=>{
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
            }, ()=>console.log('cancel')
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
    ReadCSV: route  =>{
       if(document.getElementById('formFile').files.length == 0){
        alertify.alert('No File Detected', "Please select a file to proceed on scanning we can't scan a file if you don't select a file for us");
       }else{
        document.getElementById('mainLoader').style.display = 'grid';
        var formData = new FormData($('#scanCSVForm')[0]);
        $.ajax({
         type: "POST",
         url: route,
         data: formData,
         contentType: false,
         processData: false,
         success: res=>{
            document.getElementById('mainLoader').style.display = 'none';
            var saveCSV = new bootstrap.Modal(document.getElementById('saveCSVdata'));
            document.getElementById('classAddCSV').click();
            AsText('numOfRows', res.company.length);
            saveCSV.show();
            csvData = res;
            
         }, error: xhr=>{
            console.log(xhr.responseText);
         }
        });
       }
    }, SaveCSVData: (route, load, getDetail, disable)=>{
        const length = csvData.company.length;
        const each = (1/length)*100;
        const progressBar = document.getElementById('progressBar');
        const progressStatus = document.getElementById('progressStatus');
        const totalData = document.getElementById('totalData');
        const savedData = document.getElementById('savedData');
       
        for(let i = 0; i < length; i++){
           AsVal('companyNameAdd', csvData.company[i]);
           AsVal('nameAdd', csvData.name[i]);
           AsVal('emailAdd', csvData.email[i]);

     
            $.ajax({
                type:"POST",
                url: route,
                data: $('form#addLeadForm').serialize(),
                success: res=>{
                 if(res.status === 'success'){
                    const percent = (i + 1) * each;
                    progressBar.style.width = percent + "%";
                    progressStatus.textContent = percent;
                    totalData.textContent = length;
                    savedData.textContent = i + 1;
                 }
                }, error: xhr=>{
                    console.log(xhr.responseText);
                }
            })
        
            
        }

        LoadLead(load, getDetail, disable);
        document.getElementById('doneButton').style.display = 'flex';
    }
}

function AsVal(id, value){
    document.getElementById(id).value = value;
}
function AsText(id, value){
    document.getElementById(id).textContent = value;
}
let tables;
function LoadLead(route, getDetail, disable){
    $.ajax({
        type:"GET",
        url: route,
        dataType: "json",
        success:  res=>{
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
                        { title: "Status", 
                          data:  null,
                          render: data=>{
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
            }else {
                tables.clear().rows.add(res.data).draw();
              }
          
        }, error: xhr=>{
          console.log(xhr.responseText);
        }
      });
}
