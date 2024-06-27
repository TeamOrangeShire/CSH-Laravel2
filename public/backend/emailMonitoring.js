let table;
function LoadAll(route){
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
                                
                                return `<div class="badge
                                 bg-${data.se_status == 1 ? 'danger' : 'success'}
                                  w-100"><h4 class="lead">${data.se_status == 1 ? 'Not Yet' : 'Seen'}</h4></div>`;
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