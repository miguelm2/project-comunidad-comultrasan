$(document).ready(function () {
   getcharViews();
   getcharPoints();
});

function getcharViews() {
   var ctxViews = document.getElementById("chart-bars").getContext("2d");

   $.post("../../php/routing/Admin.php", {
      getChartViews: true,
   }).done(function (data) {
      let resultado = JSON.parse(data);
      LineChartViews(ctxViews, resultado[0], resultado[1]);
   });
}

function LineChartViews(ctxViews, meses, visitas) {
   if (window.grafica1) {
      window.grafica1.clear();
      window.grafica1.destroy();
   }

   window.grafica1 = new Chart(ctxViews, {
      plugins: [ChartDataLabels],
      type: "bar",
      data: {
         labels: meses,
         datasets: [
            {
               label: "Visitas",
               tension: 0.4,
               borderWidth: 0,
               borderRadius: 4,
               borderSkipped: false,
               backgroundColor: "rgba(255, 255, 255, 1)",
               data: visitas,
               maxBarThickness: 20,
            },
         ],
      },
      options: {
         responsive: true,
         maintainAspectRatio: false,
         plugins: {
            legend: {
               display: false,
            },
         },
         interaction: {
            intersect: false,
            mode: "index",
         },
         scales: {
            y: {
               grid: {
                  drawBorder: false,
                  display: true,
                  drawOnChartArea: true,
                  drawTicks: false,
                  borderDash: [5, 5],
                  color: "rgba(255, 255, 255, .6)",
               },
               ticks: {
                  suggestedMin: 0,
                  suggestedMax: 500,
                  beginAtZero: true,
                  padding: 10,
                  font: {
                     size: 14,
                     weight: 300,
                     family: "Roboto",
                     style: "normal",
                     lineHeight: 2,
                  },
                  color: "#fff",
               },
            },
            x: {
               grid: {
                  drawBorder: false,
                  display: true,
                  drawOnChartArea: true,
                  drawTicks: false,
                  borderDash: [5, 5],
                  color: "rgba(255, 255, 255, .6)",
               },
               ticks: {
                  display: true,
                  color: "#fff",
                  padding: 10,
                  font: {
                     size: 14,
                     weight: 300,
                     family: "Roboto",
                     style: "normal",
                     lineHeight: 2,
                  },
               },
            },
         },
      },
   });
}

function getcharPoints() {
   var ctxPoints = document.getElementById("chart-line").getContext("2d");

   $.post("../../php/routing/Admin.php", {
      getChartPoints: true,
   }).done(function (data) {
      let resultado = JSON.parse(data);
      LineChartPoints(ctxPoints, resultado[0], resultado[1]);
   });
}
function LineChartPoints(ctxPoints, meses, puntos) {
   if (window.grafica2) {
      window.grafica2.clear();
      window.grafica2.destroy();
   }

   window.grafica2 = new Chart(ctxPoints, {
      plugins: [ChartDataLabels],
      type: "bar",
      data: {
         labels: meses,
         datasets: [
            {
               label: "Puntos",
               tension: 0.4,
               borderWidth: 0,
               borderRadius: 4,
               borderSkipped: false,
               backgroundColor: "rgba(255, 255, 255, 1)",
               data: puntos,
               maxBarThickness: 20,
            },
         ],
      },
      options: {
         responsive: true,
         maintainAspectRatio: false,
         plugins: {
            legend: {
               display: false,
            },
         },
         interaction: {
            intersect: false,
            mode: "index",
         },
         scales: {
            y: {
               grid: {
                  drawBorder: false,
                  display: true,
                  drawOnChartArea: true,
                  drawTicks: false,
                  borderDash: [5, 5],
                  color: "rgba(255, 255, 255, .6)",
               },
               ticks: {
                  suggestedMin: 0,
                  suggestedMax: 500,
                  beginAtZero: true,
                  padding: 10,
                  font: {
                     size: 14,
                     weight: 300,
                     family: "Roboto",
                     style: "normal",
                     lineHeight: 2,
                  },
                  color: "#fff",
               },
            },
            x: {
               grid: {
                  drawBorder: false,
                  display: true,
                  drawOnChartArea: true,
                  drawTicks: false,
                  borderDash: [5, 5],
                  color: "rgba(255, 255, 255, .6)",
               },
               ticks: {
                  display: true,
                  color: "#fff",
                  padding: 10,
                  font: {
                     size: 14,
                     weight: 300,
                     family: "Roboto",
                     style: "normal",
                     lineHeight: 2,
                  },
               },
            },
         },
      },
   });
}

function getChartBenefit() {
   var ctxBenefits = document
      .getElementById("chart-line-tasks")
      .getContext("2d");

   $.post("../../php/routing/Admin.php", {
      getChartBenefit: true,
   }).done(function (data) {
      let resultado = JSON.parse(data);
      LineChartBenefits(ctxBenefits, resultado[0], resultado[1]);
   });
}
function LineChartBenefits(ctxBenefits, meses, benefits) {
   if (window.grafica3) {
      window.grafica3.clear();
      window.grafica3.destroy();
   }

   window.grafica3 = new Chart(ctxBenefits, {
      plugins: [ChartDataLabels],
      type: "bar",
      data: {
         labels: meses,
         datasets: [
            {
               label: "Beneficios",
               tension: 0.4,
               borderWidth: 0,
               pointRadius: 4,
               borderSkipped: false,
               backgroundColor: "rgba(255, 255, 255, 1)",
               data: benefits,
               maxBarThickness: 20,
            },
         ],
      },
      options: {
         responsive: true,
         maintainAspectRatio: false,
         plugins: {
            legend: {
               display: false,
            },
         },
         interaction: {
            intersect: false,
            mode: "index",
         },
         scales: {
            y: {
               grid: {
                  drawBorder: false,
                  display: true,
                  drawOnChartArea: true,
                  drawTicks: false,
                  borderDash: [5, 5],
                  color: "rgba(255, 255, 255, .6)",
               },
               ticks: {
                  suggestedMin: 0,
                  suggestedMax: 500,
                  beginAtZero: true,
                  padding: 10,
                  font: {
                     size: 14,
                     weight: 300,
                     family: "Roboto",
                     style: "normal",
                     lineHeight: 2,
                  },
                  color: "#fff",
               },
            },
            x: {
               grid: {
                  drawBorder: false,
                  display: true,
                  drawOnChartArea: true,
                  drawTicks: false,
                  borderDash: [5, 5],
                  color: "rgba(255, 255, 255, .6)",
               },
               ticks: {
                  display: true,
                  color: "#f8f9fa",
                  padding: 10,
                  font: {
                     size: 14,
                     weight: 300,
                     family: "Roboto",
                     style: "normal",
                     lineHeight: 2,
                  },
               },
            },
         },
      },
   });
}
function getChartDiscount() {
   var ctxDiscount = document
      .getElementById("chart-discount")
      .getContext("2d");

   $.post("../../php/routing/Admin.php", {
      getChartDiscount: true,
   }).done(function (data) {
      let resultado = JSON.parse(data);
      LineChartDiscount(ctxDiscount, resultado[0], resultado[1]);
   });
}
function LineChartDiscount(ctxDiscount, meses, discount) {
   if (window.grafica4) {
      window.grafica4.clear();
      window.grafica4.destroy();
   }

   window.grafica3 = new Chart(ctxDiscount, {
      plugins: [ChartDataLabels],
      type: "bar",
      data: {
         labels: meses,
         datasets: [
            {
               label: "Descuentos",
               tension: 0.4,
               borderWidth: 0,
               pointRadius: 4,
               borderSkipped: false,
               backgroundColor: "rgba(255, 255, 255, 1)",
               data: discount,
               maxBarThickness: 20,
            },
         ],
      },
      options: {
         responsive: true,
         maintainAspectRatio: false,
         plugins: {
            legend: {
               display: false,
            },
         },
         interaction: {
            intersect: false,
            mode: "index",
         },
         scales: {
            y: {
               grid: {
                  drawBorder: false,
                  display: true,
                  drawOnChartArea: true,
                  drawTicks: false,
                  borderDash: [5, 5],
                  color: "rgba(255, 255, 255, .6)",
               },
               ticks: {
                  suggestedMin: 0,
                  suggestedMax: 500,
                  beginAtZero: true,
                  padding: 10,
                  font: {
                     size: 14,
                     weight: 300,
                     family: "Roboto",
                     style: "normal",
                     lineHeight: 2,
                  },
                  color: "#fff",
               },
            },
            x: {
               grid: {
                  drawBorder: false,
                  display: true,
                  drawOnChartArea: true,
                  drawTicks: false,
                  borderDash: [5, 5],
                  color: "rgba(255, 255, 255, .6)",
               },
               ticks: {
                  display: true,
                  color: "#fff",
                  padding: 10,
                  font: {
                     size: 14,
                     weight: 300,
                     family: "Roboto",
                     style: "normal",
                     lineHeight: 2,
                  },
               },
            },
         },
      },
   });
}