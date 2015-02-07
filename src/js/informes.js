$(function () {
  $('#informe1').highcharts({
      chart: {
          backgroundColor: 'rgb(250,250,250)',
          type: 'column'
      },
      title: {
          text: 'Reparaciones'
      },
      xAxis: {
          categories: [
              'Enero',
              'Febrero',
              'Marzo',
              'Abril',
              'Mayo',
              'Junio',
              'Julio',
              'Agosto',
              'Septiembre',
              'Octubre',
              'Noviembre',
              'Deciembre'
          ]
      },
      yAxis: {
        min: 0,
          title: {
              text: 'Número de SAT reparados'
          }
      },
      tooltip: {
          headerFormat: '<strong><span style="font-size:12px">{point.key}</span></strong><table>',
          pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
              '<td style="padding:0"><b>{point.y:.1f} SAT reparados</b></td></tr>',
          footerFormat: '</table>',
          shared: true,
          useHTML: true
      },
      plotOptions: {
          column: {
              pointPadding: 0.2,
              borderWidth: 0
          }
      },
      series: [{
          name: 'Reparaciones',
          data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
          color: 'rgb(110,210,156)'
      }]


  });

  $('#informe2').highcharts({
      chart: {
        backgroundColor: 'rgb(250,250,250)',
        type: 'column'
      },
      title: {
          text: 'Ganancia'
      },
      xAxis: {
          categories: [
              'Enero',
              'Febrero',
              'Marzo',
              'Abril',
              'Mayo',
              'Junio',
              'Julio',
              'Agosto',
              'Septiembre',
              'Octubre',
              'Noviembre',
              'Deciembre'
          ]
      },
      yAxis: {
        min: 0,
          title: {
              text: 'Ganancia obtenida por las reparaciones (€)'
          }
      },
      tooltip: {
          headerFormat: '<strong><span style="font-size:10px">{point.key}</span></strong><table>',
          pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
              '<td style="padding:0"><b>{point.y:.1f} €</b></td></tr>',
          footerFormat: '</table>',
          shared: true,
          useHTML: true
      },
      plotOptions: {
          column: {
              pointPadding: 0.2,
              borderWidth: 0
          }
      },
      series: [{
          name: 'Reparaciones',
          data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
          color: 'rgb(110,210,156)'

      }]
  });

});
