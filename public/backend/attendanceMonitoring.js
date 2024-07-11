let table;
let tables;
const Att = {
    LoadTable: (route, img, user) => {
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
                                                  <span class="fw-semibold text-decoration-underline"><a href="${user}?user=${data.user_id}">${ data.user_name }</a></span>`
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
    }, Filter: (route, img, user) => {
        const year = document.getElementById('attYear');
        const month = document.getElementById('attMonth');

        const load = `${route}?year=${year.value}&month=${month.value}`;

        Att.LoadTable(load,img, user);
    }, LoadUserGraph: (route, id)=> {
        const load =  `${route}?user_id=${id}`;
        const pipeline = ['Lead', 'Prospect', 'Discussion', 'Proposal', 'Negotiation', 'Contract', 'Won', 'Lost', 'DNC'];
        const month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $.ajax({
            type:"GET",
            url: load,
            dataType: "json",
            success: res=> {
              const data = res.users;
              const pl_data = [data.lead, data.prospect, data.discussion, data.proposal, data.negotiation, data.contract, data.won, data.lost, data.dnc];
              Att.Graph(pipeline,pl_data,'#pipeline');
            }, error: xhr => console.log(xhr.responseText)
        })
    }, Graph: (key, value, graphs) => {
        var options = {
            chart: {
                height: 250,
                type: "bar",
                toolbar: {
                    show: false,
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: "smooth",
                width: 2,
                colors: ["#e87609", "rgba(255, 255, 255, 0.2)", "rgba(0, 0, 0, 0.2)"],
            },
            series: [
                {
                    name: "#",
                    data: value,
                },
            ],
            grid: {
                borderColor: "rgba(255, 255, 255, .20)",
                strokeDashArray: 5,
                xaxis: {
                    lines: {
                        show: true,
                    },
                },
                yaxis: {
                    lines: {
                        show: false,
                    },
                },
                padding: {
                    top: 0,
                    right: 0,
                    bottom: 10,
                    left: 0,
                },
            },
            xaxis: {
                categories:key
            },
            yaxis: {
                labels: {
                    show: false,
                },
            },
            colors: ["transparent", "transparent", "transparent"],
            markers: {
                size: 0,
                opacity: 0.3,
                colors: ["#eaf1ff", "#ffffff", "#eff1f6"],
                strokeColor: "#ffffff",
                strokeWidth: 2,
                hover: {
                    size: 7,
                },
            },
        };
        
        var chart = new ApexCharts(document.querySelector(graphs), options);
        chart.render();
        
    }, LoadAttendance: (route, approved) => {
        $.ajax({
            type: "GET",
            url: route,
            dataType: "json",
            success: res => {
                if (!$.fn.DataTable.isDataTable('#empAttendance')) {
                    tables = $('#empAttendance').DataTable({
                        data: res.data,
                        columns: [
                            { title: "Date", data: "att_date" },
                            { title: "Workday", data: "att_workday" },
                            { title: "Time In", data: "att_time_in" },
                            { title: "Time Out", data: "att_time_out" },
                            { title: "Total Time", data: "att_total_time" },
                            { title: "Final Time(Deducted Break Time)", data: null,
                                render: data => {
                                    return data.att_time_out != '' ? `${data.att_total_hours - 1 }Hrs & ${data.att_total_minutes}Mins` : 'N/A';
                                }
                             },
                            { title: "Over Time", data: "att_overtime" },
                            { title: "Approval", data: null, 
                                render: data=> {
                                    const btn = data.att_overtime_status === 1 ? 'btn-outline-danger' : 'btn-outline-success';
                                    const icon = data.att_overtime_status === 1 ? 'icon-x' : 'icon-check_circle';
                                    const text = data.att_overtime_status === 1 ? 'Cancel' : 'Approve Overtime';
                                    const dis = data.att_time_out == '' ? 'disabled' : '';
                                    return `<button  ${dis} onclick="Att.ApproveOvertime('${approved}', '${data.att_id}', this)" class="btn w-100 ${btn}"><i class="${icon}"></i> ${text}</button>`
                                }
                             },
                        ],
                        autoWidth: false,
    
                    });
                } else {
                    tables.clear().rows.add(res.data).draw();
                }
    
            }, error: xhr => {
                console.log(xhr.responseText);
            }
        });
    }, ApproveOvertime: (route, id, button) => {
       Support.AsVal('att_id', id);

       $.ajax({
         type: "POST",
         url: route,
         data: $('form#approvedOvertime').serialize(),
         success: res => {
           if(res.status === 'success'){
              if(res.data === 'cancel'){
                button.classList.add('btn-outline-success');
                button.classList.remove('btn-outline-danger');
  
                button.innerHTML = `<i class="icon-check_circle"></i> Approve Overtime`;
              }else {
                button.classList.remove('btn-outline-success');
                button.classList.add('btn-outline-danger');
  
                button.innerHTML = `<i class="icon-x"></i> Cancel`
              }
           }
         }, error: xhr => console.log(xhr.responseText),
       });
    }
}