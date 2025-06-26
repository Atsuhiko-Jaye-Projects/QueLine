<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Wine Production Chart</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #f5f7fa;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 40px 20px;
    }

    /* .chart-container {
      background: white;
      padding: 20px;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      max-width: 600px;
      width: 100%;
    } */

    h2 {
      margin-bottom: 20px;
      color: #333;
      text-align: center;
    }

    /* canvas {
      width: 100% !important;
      height: auto !important;
    } */

    /* Move legend to the bottom */
    .chart-container .chart-legend {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      margin-top: 20px;
      font-size: 14px;
    }

    .chart-container .chart-legend li {
      list-style: none;
      margin: 5px 15px;
      display: flex;
      align-items: center;
    }

    .chart-container .chart-legend span {
      display: inline-block;
      width: 12px;
      height: 12px;
      margin-right: 8px;
      border-radius: 3px;
    }
  </style>
</head>
<body>

  <div class="chart-container">
    <h2>World Wine Production (2018)</h2>
    <canvas id="myChart"></canvas>
    <ul id="chartLegend" class="chart-legend"></ul>
  </div>

  <script>
    const xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
    const yValues = [55, 49, 44, 24, 15];
    const barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#e8c3b9",
      "#1e7145"
    ];

    const myChart = new Chart("myChart", {
      type: "pie",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: false
        },
        legend: {
          display: false // disable built-in legend
        }
      }
    });

    // Generate custom legend below chart
    const legendContainer = document.getElementById('chartLegend');
    xValues.forEach((label, index) => {
      const li = document.createElement('li');
      li.innerHTML = `<span style="background-color:${barColors[index]}"></span>${label}`;
      legendContainer.appendChild(li);
    });
  </script>

</body>
</html>
