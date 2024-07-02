let table;
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
              const dh_data = [data.January, data.February, data.March, data.April, data.May, data.June, data.July, data.August, data.September, data.October, data.November, data.December];
              Att.Graph(pipeline,pl_data,'#pipeline');
              Att.Graph(month,dh_data,'#dutyHours');
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
        
    }
}