// pie chart
var options1 = {
    chart: {
        width: 380,
        type: "pie",
    },
    labels: ["Chrome", "Firefox", "Safari", "Edge", "Opera"],
    series: [50, 20, 15, 10, 5],
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 200,
            },
            legend: {
                show: false,
            },
        },
    }, ],
    colors: [
        AdmiroAdminConfig.primary,
        AdmiroAdminConfig.secondary,
        "#3eb95f",
        "#ea9200",
        "#e74b2b",
    ],
};

var options2 = {
    chart: {
        width: 380,
        type: "pie",
    },
    labels: ["Desktop", "Laptop", "Tablet", "Smartphone", "Smartwatch"],
    series: [40, 30, 15, 10, 5],
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 200,
            },
            legend: {
                show: false,
            },
        },
    }, ],
    colors: [
        AdmiroAdminConfig.primary,
        AdmiroAdminConfig.secondary,
        "#3eb95f",
        "#ea9200",
        "#e74b2b",
    ],
};

var options3 = {
    chart: {
        width: 380,
        type: "pie",
    },
    labels: ["Windows", "macOS", "Linux", "Android", "iOS"],
    series: [30, 25, 20, 15, 10],
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 200,
            },
            legend: {
                show: false,
            },
        },
    }, ],
    colors: [
        AdmiroAdminConfig.primary,
        AdmiroAdminConfig.secondary,
        "#3eb95f",
        "#ea9200",
        "#e74b2b",
    ],
};


var options4 = {
    chart: {
        width: 380,
        type: "pie",
    },
    labels: ["USA", "India", "China", "Brazil", "Germany", "UK", "France", "Japan", "Canada", "Australia"],
    series: [20, 15, 12, 10, 8, 7, 6, 5, 4, 3],
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 200,
            },
            legend: {
                show: false,
            },
        },
    }, ],
    colors: [
        AdmiroAdminConfig.primary,
        AdmiroAdminConfig.secondary,
        "#3eb95f",
        "#ea9200",
        "#e74b2b",
        "#8e44ad",
        "#3498db",
        "#f1c40f",
        "#e67e22",
        "#2ecc71",
        "#1abc9c",
    ],
};

// line chart
var options5 = {
    chart: {
        type: "line",
        height: 350,
    },
    series: [{
        name: "Sales",
        data: [10, 41, 35, 51, 49, 62, 69, 91, 148, 130, 120, 110, 100, 90, 80, 70, 60, 50, 40, 30, 20, 10, 5, 15, 25, 35, 45, 55, 65, 75]
    }],
    xaxis: {
        categories: ["Day 1", "Day 2", "Day 3", "Day 4", "Day 5", "Day 6", "Day 7", "Day 8", "Day 9", "Day 10", "Day 11", "Day 12", "Day 13", "Day 14", "Day 15", "Day 16", "Day 17", "Day 18", "Day 19", "Day 20", "Day 21", "Day 22", "Day 23", "Day 24", "Day 25", "Day 26", "Day 27", "Day 28", "Day 29", "Day 30"]
    }
};

var chart1 = new ApexCharts(document.querySelector("#browserchart"), options1);
var chart2 = new ApexCharts(document.querySelector("#devicechart"), options2);
var chart3 = new ApexCharts(document.querySelector("#oschart"), options3);
var chart4 = new ApexCharts(document.querySelector("#countrychart"), options4);
var chart5 = new ApexCharts(document.querySelector("#statschart"), options5);

chart1.render();
chart2.render();
chart3.render();
chart4.render();
chart5.render();