var options = {
	series: [15, 18, 13],
	chart: {
		height: 220,
		type: "polarArea",
	},
	labels: ["Busy", "Online", "Offline"],
	fill: {
		opacity: 1,
	},
	stroke: {
		width: 0,
		colors: ["#ffffff", "#ffffff", "#ffffff"],
	},
	colors: ["#e87609", "rgba(0, 0, 0, 0.1)", "rgba(0, 0, 0, 0.2)"],
	yaxis: {
		show: false,
	},
	legend: {
		show: false,
	},
	tooltip: {
		y: {
			formatter: function (val) {
				return val;
			},
		},
	},
	plotOptions: {
		polarArea: {
			rings: {
				strokeWidth: 0,
			},
			spokes: {
				strokeWidth: 0,
			},
		},
	},
};

var chart = new ApexCharts(document.querySelector("#agentsLiveData"), options);
chart.render();
