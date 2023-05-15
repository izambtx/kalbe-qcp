// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var qcp_B1 = document.getElementById("qcpMB1").value;
var qcp_B2 = document.getElementById("qcpMB2").value;
var qcp_B3 = document.getElementById("qcpMB3").value;
var qcp_B4 = document.getElementById("qcpMB4").value;
var qcp_B5 = document.getElementById("qcpMB5").value;

var qcp_F1 = document.getElementById("qcpMF1").value;
var qcp_F2 = document.getElementById("qcpMF2").value;
var qcp_F3 = document.getElementById("qcpMF3").value;
var qcp_F4 = document.getElementById("qcpMF4").value;
var qcp_F5 = document.getElementById("qcpMF5").value;

var qcp_U1 = document.getElementById("qcpMU1").value;
var qcp_U2 = document.getElementById("qcpMU2").value;
var qcp_U3 = document.getElementById("qcpMU3").value;
var qcp_U4 = document.getElementById("qcpMU4").value;
var qcp_U5 = document.getElementById("qcpMU5").value;

var qcp_L1 = document.getElementById("qcpML1").value;
var qcp_L2 = document.getElementById("qcpML2").value;
var qcp_L3 = document.getElementById("qcpML3").value;
var qcp_L4 = document.getElementById("qcpML4").value;
var qcp_L5 = document.getElementById("qcpML5").value;
var myLineChartPD = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Week 1", "Week 2", "Week 3", "Week 4", "Week 5"],
    datasets: [{
      label: "Building",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "#4e73df",
      pointRadius: 3,
      pointBackgroundColor: "#4e73df",
      pointBorderColor: "#4e73df",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "#4e73df",
      pointHoverBorderColor: "#4e73df",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [qcp_B1, qcp_B2, qcp_B3, qcp_B4, qcp_B5],
    },{
      label: "Facility",
      lineTension: 0.3,
      backgroundColor: "rgba(115, 211, 42, 0.2)",
      borderColor: "#73d32a",
      pointRadius: 3,
      pointBackgroundColor: "#73d32a",
      pointBorderColor: "#73d32a",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "#73d32a",
      pointHoverBorderColor: "rgba(115, 211, 42, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [qcp_F1, qcp_F2, qcp_F3, qcp_F4, qcp_F5],
    },{
      label: "Utility",
      lineTension: 0.3,
      backgroundColor: "rgba(112, 205, 219, 0.05)",
      borderColor: "#e74a3b",
      pointRadius: 3,
      pointBackgroundColor: "#e74a3b",
      pointBorderColor: "#e74a3b",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [qcp_U1, qcp_U2, qcp_U3, qcp_U4, qcp_U5],
    },{
      label: "Lain-Lain",
      lineTension: 0.3,
      backgroundColor: "rgba(112, 205, 219, 0.05)",
      borderColor: "#60616f",
      pointRadius: 3,
      pointBackgroundColor: "#60616f",
      pointBorderColor: "#474952",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [qcp_L1, qcp_L2, qcp_L3, qcp_L4, qcp_L5],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 12
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 10,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ' : ' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

