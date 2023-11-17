const d = new Date();
let currmonth = d.getMonth();

console.log(currmonth)
if (currmonth <= 5) {
    var xValues = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'];
} else {
    xValues = ['Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
}


        
new Chart("myChart", {
    type: "line",
    data: {
    labels: xValues,
    datasets: [{ 
        data: [1600,1700,7000,1900,1900,1000],
        borderColor: "#3DD598",
        radius: 4,
        hoverBorderWidth: 3,
        pointBorderWidth: 1,
        pointBackgroundColor: "#ffffff",
        pointBorderColor: "#3DD598",
        fill: false
    }, { 
        data: [1600,1700,1700,900,900,1700],
        borderColor: "#74EE9B",
        radius: 4,
        hoverBorderWidth: 3,
        pointBorderWidth: 1,
        pointBackgroundColor: "#ffffff",
        pointBorderColor: "#74EE9B",
        fill: false
    }, { 
        data: [3000, 2700,2800, 2500, 2000, 2200],
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