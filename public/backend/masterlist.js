let tables;
function LoadAll(route){
    $.ajax({
        type: "GET",
        url: route,
        dataType: "json",
        success: res => {
            if (!$.fn.DataTable.isDataTable('#masterList')) {
                tables = $('#masterList').DataTable({
                    data: res.data,
                    columns: [
                        { title: "Lead Owner", data: "user" },
                        { title: "Contact Name", data: "pl_company_name" },
                        { title: "Contact Person", data: "pl_name" },
                        { title: "Email", data: "pl_email" },
                        { title: "Status", data: "pl_status" },
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