let table;
function LoadAll(route, load){
    $.ajax({
        type: "GET",
        url: route,
        dataType: "json",
        success: res => {
            if (!$.fn.DataTable.isDataTable('#emailMonitoring')) {
                table = $('#emailMonitoring').DataTable({
                    data: res.data,
                    columns: [
                   
                        { title: "Company", data: "company" },
                        { title: "Contact Person", data: "name" },
                        { title: "Email", data: "email" },
                        { title: "Sevice Offer", data: "se_offer" },
                        { title: "Date Sent", data: "se_date" },
                        { title: "Level", data: "se_level" },
                        { title: "Status ", 
                            data: null,
                            render: data => {
                                
                                return `<button onclick="PreviewMessage('${load}','${data.se_id}')" type="button" 
                                            data-bs-toggle="modal" data-bs-target="#viewMessage" 
                                  
                                            class="btn btn-outline-${data.se_status == 1 ? 'danger' : 'success'} text-decoration-underline">
                                            ${data.se_status == 1 ? 'Not Yet' : 'Seen'}</button>`;
                            }
                         },
                    ],
                    autoWidth: false,
                    
                });
            } else {
                table.clear().rows.add(res.data).draw();
            }

        }, error: xhr => {
            console.log(xhr.responseText);
        }
    });
}

function PreviewMessage(route, id){

    $.ajax({
        type:'GET',
        url: `${route}?message=${id}`,
        dataType:"json",
        success: res=>{
            Support.AsText('previewCompany', res.data.company);
            Support.AsText('previewPerson', res.data.name);
            Support.AsText('previewMail', res.data.email);
          document.getElementById('previewMessage').innerHTML = res.data.se_message;
        }, error: xhr => console.log(xhr.responseText)
    })
}