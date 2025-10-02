//Chart script for LGA  (Makusanyo vs Makadirio via Taasisi)

google.charts.load('current',{
  "packages":["corechart"],"callback":drawChart,"language":"sw"
});
function drawChart(){
  var w2 = new google.visualization.ColumnChart(document.getElementById('sales-chart'));
  w2.draw(new google.visualization.DataTable(
    {cols:[
        {label:"Manispaa ",type:"string"},
        {label:"Makusanyo",type:"number"},
        {label:"Makadirio",type:"number"}
      ],

      rows:[
        {c:[{v:"<?= 'Baraza la manispaa Mjini' ?>"},{v:<?= '644' ?>},{v:444}]},
        {c:[{v:"Baraza la manispaa Magharib A"},{v:300},{v:644}]},
        {c:[{v:"Baraza la manispaa Magharib B"},{v:1085},{v:644}]},
        {c:[{v:"Baraza la mji Kaskazini A"},{v:579},{v:644}]},
        {c:[{v:"Baraza la mji Kaskazini B"},{v:613},{v:644}]},
        {c:[{v:"Baraza la mji Kusini "},{v:753},{v:644}]},
        {c:[{v:"Halmashauri ya wilaya ya kati"},{v:1195},{v:644}]},
        {c:[{v:"Baraza la mji Wete"},{v:331},{v:644}]},
        {c:[{v:"Baraza la mji Chakechake"},{v:907},{v:644}]},
        {c:[{v:"Baraza la mji Mkoani"},{v:260},{v:644}]},
        {c:[{v:"Halmashauri ya wilaya ya micheweni"},{v:197},{v:644}]} 
      ]
    }
  ),
  {});
};
    
/* global Chart:false */
  // $(function () {
  //   'use strict'

  //   var ticksStyle = {
  //     fontColor: '#495057',
  //     fontStyle: 'bold'
  //   }

  //   var mode = 'index'
  //   var intersect = true

  //   var $salesChart = $('#sales-chart')
  //   // eslint-disable-next-line no-unused-vars
  //   var salesChart = new Chart($salesChart, {
  //     type: 'bar',
  //     data: {

  //      labels:['<?= "hshs,kssd,sds,aa,aa,aa,aa,aa,aa,aa,aa";?>'],
  //       //labels: ['BARAZA LA MANISPAA MJINI', 'BARAZA LA MANISPAA MAGHARIB A', 'BARAZA LA MANISPAA MAGHARIB B', 'BARAZA LA MJI KASKAZINI A', 'BARAZA LA MJI KASKAZINI B', 'BARAZA LA MJI KUSINI', 'HALMASHAURI YA WILAYA YA KATI', 'BARAZA LA MJI WETE', 'BARAZA LA MJI CHAKECHAKE', 'BARAZA LA MJI MKOANI', 'HALMASHAURI YA WILAYA YA MICHEWENI'],
  //       datasets: [
  //         {
  //           //Makusanyo
  //           backgroundColor: "<?php echo '#007bff' ?>",
  //           borderColor: '#007bff',
  //           data: [5000000, 4000000, 6000000, 2500000, 6700000, 5500000, 3000000,5000000, 4000000, 6000000, 2500000]
  //         },
  //         {
  //           //Makadirio
  //           backgroundColor: '#FBDD00',
  //           borderColor: '#28A745',
  //           data: [10000000, 15000000, 8000000, 13000000, 14000000, 7000000, 5000000, 15000000, 8000000, 13000000, 14000000]
  //         }
  //       ]
  //     },
  //     options: {
  //       maintainAspectRatio: false,
  //       tooltips: {
  //         mode: mode,
  //         intersect: intersect
  //       },
  //       hover: {
  //         mode: mode,
  //         intersect: intersect
  //       },
  //       legend: {
  //         display: false
  //       },
  //       scales: {
  //         yAxes: [{
  //           // display: false,
  //           gridLines: {
  //             display: true,
  //             lineWidth: '4px',
  //             color: 'rgba(0, 0, 0, .2)',
  //             zeroLineColor: 'transparent'
  //           },
  //           ticks: $.extend({
  //             beginAtZero: true,

  //             // Include a dollar sign in the ticks
  //             callback: function (value) {
  //               if (value <= 1000) {
  //                 value *= 100
  //                 // value += '.0'
  //               }

  //               // return 'TZS ' + value
  //               return formatter.format(value) // "$1,000.00"
  //             }
  //           }, ticksStyle)
  //         }],
  //         xAxes: [{
  //           display: true,
  //           gridLines: {
  //             display: false
  //           },
  //           ticks: ticksStyle
  //         }]
  //       }
  //     }
  //   })

  // })

  // //function to format number into currency
  // const formatter = new Intl.NumberFormat('en-US', {
  //   style: 'currency',
  //   currency: 'TZS',
  //   //SET DECIMAL PLACES
  //   minimumFractionDigits: 0
  // })

  // // lgtm [js/unused-local-variable]