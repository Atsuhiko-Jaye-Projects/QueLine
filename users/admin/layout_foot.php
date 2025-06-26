<script>
// const urlParams = new URLSearchParams(window.location.search);
// const dateFromURL = urlParams.get('date');

//   const input = document.getElementById('datePicker');
//   const today = new Date();
//   const yyyy = today.getFullYear();
//   const mm = String(today.getMonth() + 1).padStart(2, '0'); // months are 0-based
//   const dd = String(today.getDate()).padStart(2, '0');
//   input.value = `${yyyy}-${mm}-${dd}`;

// const dateInput = document.getElementById('datePicker');
// if (dateFromURL) {
//   dateInput.value = dateFromURL;
// }

// dateInput.addEventListener('change', function () {
//   const selectedDate = this.value;
//   if (selectedDate) {
//     // Optional: preserve other URL params
//     urlParams.set('date', selectedDate);
//     window.location.search = urlParams.toString();
//   }
// });


const xValues = ["Cancelled", "Served", "No show"];
const yValues = [36.5, 22.1, 41.3];
const barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797"
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
</div>
</div>
</body>
</html>







