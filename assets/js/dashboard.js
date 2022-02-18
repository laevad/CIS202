
const charts = document.querySelectorAll(".chart");
charts.forEach(function (chart) {
  var ctx = chart.getContext("2d");
  new Chart(ctx, {
    type: "line",
    data: {
      labels: ["CAF", "CAS", "CBM", "College of Communication", "College of Education", "College of Medicine", "College of Nursing", "College of PESCAR", "CICT" ],
      datasets: [
        {
          label: "# of Counts",
          type: 'line',
          data: [28, 89, 17, 14, 63, 68, 27, 16, 13],
          backgroundColor: 'transparent',
          borderColor: '#F48128',
          pointBorderColor: '#F48128',
          // pointBackgroundColor: '#F48128',
          pointBackgroundColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(153, 102, 255, 1)",
            "rgba(255, 159, 64, 1)",
            "rgba(150, 250, 165, 1)",
            "rgb(150,173,250)",
            "rgba(24, 59, 92, 1)",
          ],
          borderWidth: 1,
          lineTension: 0,
          fill: false
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },

  });
});

