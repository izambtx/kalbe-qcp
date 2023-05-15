// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var CountBU = document.getElementById("CBU").value;
var CountFU = document.getElementById("CFU").value;
var CountUU = document.getElementById("CUU").value;
var CountLLU = document.getElementById("CLLU").value;
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Building", "Facility", "Utility", "Lain-Lain"],
    datasets: [{
      data: [CountBU, CountFU, CountUU, CountLLU],
      backgroundColor: ['#4e73df', '#73d32a', '#e74a3b', '#858796'],
      hoverBackgroundColor: ['#2e59d9', '#4ec433', '#be2617', '#60616f'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 70,
  },
});
