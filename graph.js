const xValues = [100,200,300,400,500,600,700,800,900,1000];
        
new Chart("myChart", {
    type: "line",
    data: {
    labels: xValues,
    datasets: [{ 
        data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
        borderColor: "#3DD598",
        radius: 4,
        hoverBorderWidth: 3,
        pointBorderWidth: 1,
        pointBackgroundColor: "#ffffff",
        pointBorderColor: "#3DD598",
        fill: false
    }, { 
        data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
        borderColor: "#74EE9B",
        radius: 4,
        hoverBorderWidth: 3,
        pointBorderWidth: 1,
        pointBackgroundColor: "#ffffff",
        pointBorderColor: "#74EE9B",
        fill: false
    }, { 
        data: [8000, 7700,7800, 7500, 7000, 7200, 7300, 7000, 6500, 6000],
        borderColor: "#84ECBF",
        radius: 4,
        hoverBorderWidth: 3,
        pointBorderWidth: 1,
        pointBackgroundColor: "#ffffff",
        pointBorderColor: "#84ECBF",
        fill: false
    }]
    },
    options: {
    legend: {display: false}
    }
});