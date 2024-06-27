let table;
const Att = {
    LoadTable: (route, img) => {
        $.ajax({
            type: "GET",
            url: route,
            dataType: "json",
            success: res => {
                if (!$.fn.DataTable.isDataTable('#attendanceTable')) {
                    table = $('#attendanceTable').DataTable({
                        data: res.data,
                        columns: [
                       
                            { title: "ID", data: "user_emp_id" },
                            {
                                title: "Name",
                                data: null,
                                render: data => {
                                    return `<img src="${data.user_pic == 'none' ? img + '/placeholder.webp' : img + '/' + data.user_pic}"
                                                     class="img-2x me-2 rounded-3"
                                                    alt="User Profile" />
                                                  <span class="fw-semibold">${ data.user_name }</span>`
                                }
                            },
                            { title: "Job Title", data: "user_position" },
                            { title: "Total Hours", data: "totalHours" },
                            { title: "Salary", data: "month" },
                          
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
    }, Filter: (route, img) => {
        const year = document.getElementById('attYear');
        const month = document.getElementById('attMonth');

        const load = `${route}?year=${year.value}&month=${month.value}`;

        Att.LoadTable(load,img);
    }
}