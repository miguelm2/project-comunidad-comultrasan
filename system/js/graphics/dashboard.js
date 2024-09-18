$(document).ready(function () {
   getcharViews();
   getcharPoints();
   getChartUsers();
   getChartPonitsxCommunity();
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
function getChartUsers() {
   var ctxUsers = document
      .getElementById("chart-user")
      .getContext("2d");

   $.post("../../php/routing/Admin.php", {
      getChartUsers: true,
   }).done(function (data) {
      let resultado = JSON.parse(data);
      LineChartUser(ctxUsers, resultado[0], resultado[1]);
   });
}
function LineChartUser(ctxUsers, meses, clientes) {
   if (window.grafica4) {
      window.grafica4.clear();
      window.grafica4.destroy();
   }

   window.grafica4 = new Chart(ctxUsers, {
      plugins: [ChartDataLabels],
      type: "line",
      data: {
         labels: meses,
         datasets: [
            {
               label: "Usuarios",
               tension: 0.4,
               borderWidth: 4,
               pointRadius: 10, pointHoverRadius: 12,
               borderSkipped: false,
               backgroundColor: "rgba(255, 255, 255, 1)",
               borderColor: "rgba(255, 255, 255, 1)",
               pointBackgroundColor: "rgba(255, 255, 255, 1)",
               data: clientes,
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
function getChartPonitsxCommunity() {
   var ctxPointsxCommunity = document.getElementById('chart_community');

   $.post("../../php/routing/Admin.php", {
      "getChartTop10Community": true
   }).done(function (data) {
      var resultado = JSON.parse(data);
      let listColor = getListRandomColor(resultado[1]);

      pieChartPonitsxCommunity(ctxPointsxCommunity, resultado[1], listColor);

      // Generar etiquetas dinámicamente
      const labelContainer = document.getElementById('labelContainer');
      labelContainer.innerHTML = ''; // Limpiar contenedor de etiquetas antes de agregar nuevas
      resultado[0].forEach((nombre, index) => {
         const labelItem = document.createElement('div');
         labelItem.classList.add('label-item');
         labelItem.innerHTML = `
            <div class="label-color" style="background-color: ${listColor[index]}"></div>
            <span>${nombre}</span>
         `;
         labelContainer.appendChild(labelItem);
      });
   });
}

function pieChartPonitsxCommunity(ctxPointsxCommunity, valores, colores) {
   if (window.grafica5) {
      window.grafica5.clear();
      window.grafica5.destroy();
   }
   window.grafica5 = new Chart(ctxPointsxCommunity, {
      plugins: [ChartDataLabels],
      type: 'doughnut',
      data: {
         labels: [],
         datasets: [
            {
               data: valores,
               backgroundColor: colores,
               datalabels: {
                  align: 'center',
                  anchor: 'center'
               },
            }
         ]
      },
      options: {
         plugins: {
            datalabels: {
               /* Color del texto */
               color: "white",
               /* Formato de la fuente */
               font: {
                  family: '"Times New Roman", Times, serif',
                  size: "11"
               },
               backgroundColor: "rgba(0, 0, 0, 0.5)",
               borderRadius: "4",
               padding: "4"
            }
         }
      }
   });
}

function getListRandomColor(lista) {
   let listColor = [];

   for (let index = 0; index < lista.length; index++) {
      listColor[index] = generateRandomColor();
   }

   return listColor;
}
function generateRandomColor() {
   let maxVal = 0xFFFFFF; // 16777215
   let randomNumber = Math.random() * maxVal;
   randomNumber = Math.floor(randomNumber);
   randomNumber = randomNumber.toString(16);
   let randColor = randomNumber.padStart(6, 0);
   return `#${randColor.toUpperCase()}` + '90';
}