function informeRep(dataRep) {
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
              'Diciembre'
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
          data: dataRep,
          color: 'rgb(110,210,156)'
      }]
  });
}

function informeRec(dataRec) {
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
              'Diciembre'
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
          name: 'Recaudaciones',
          data: dataRec,
          color: 'rgb(110,210,156)'

      }]
  });
}

function pintarInforme(anio) {
  $.ajax({
        data: {"anio" : anio},
        url: 'json/informeReparaciones.php',
        type: 'GET',
        async: true,
        dataType: 'json',
        success: function(data) {
            informeRep(data);
        }
    });


    $.ajax({
        data: {"anio" : anio},
        url: 'json/informeRecaudaciones.php',
        type: 'GET',
        async: true,
        dataType: 'json',
        success: function(data) {
            informeRec(data);
        }
    });
}

$(document).ready(function() {
    $.ajax({
        data: {"anio": 2015},
        url: 'json/informeReparaciones.php',
        type: 'GET',
        async: true,
        dataType: 'json',
        success: function(data) {
            informeRep(data);
        }
    });

    $.ajax({
        data: {"anio": 2015},
        url: 'json/informeRecaudaciones.php',
        type: 'GET',
        async: true,
        dataType: 'json',
        success: function(data) {
            informeRec(data);
        }
    });

  $("#botonRefrescarInform").on('click', function(evt) {
    var anio = $("#anioInforme").val();
    pintarInforme(anio);
  });
});
