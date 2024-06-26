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
                table.clear().rows.add(res.data).draw();
            }

        }, error: xhr => {
            console.log(xhr.responseText);
        }
    });
}