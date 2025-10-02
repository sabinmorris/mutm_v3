/* global Chart:false */

$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart')
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart($salesChart, {
    type: 'bar',
    data: {
      labels: ['MALIASILI', 'LESENI', 'MADUKA', 'VIBARAZA', 'USAFI', 'HUDUMA NA BIDHAA', 'MAEGESHO'],
      datasets: [
        {
          //Makusanyo
          backgroundColor: '#007bff',
          borderColor: '#007bff',
          data: [3000000, 2000000, 8000000, 2500000, 6700000, 5500000, 3000000]
        },
        {
          //Makadirio
          backgroundColor: '#FBDD00',
          borderColor: '#28A745',
          data: [700000, 1700000, 7700000, 4000000, 1800000, 1500000, 2000000]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value) {
              if (value <= 1000) {
                value *= 100
                // value += '.0'
              }

              // return 'TZS ' + value
              return formatter.format(value) // "$1,000.00"
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })

})

//function to format number into currency
const formatter = new Intl.NumberFormat('en-US', {
  style: 'currency',
  currency: 'TZS',
  //SET DECIMAL PLACES
  minimumFractionDigits: 0
})

// lgtm [js/unused-local-variable]
