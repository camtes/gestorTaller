function filtrar(nombre) {
  var count = 0;
  $('#listado tbody tr').each(function (index) {
    $(this).children('td').each(function (index) {
      if ( $(this).children('a').hasClass('name')) {
        var nombre_aux = $(this).children('a').text().toLowerCase();
        if ( !(nombre_aux.indexOf(nombre) >= 0) ) { $(this).parent().hide(); } 
        else { count++; }
      }
    });
  });
  
  if ( count == 0 ) { alert("El nombre no coincide con ningún cliente"); }
}



$(document).ready(function() {
  $("#buscar").on('click', function(evt) {
    var nombre = $("input#b-name").val().toLowerCase();
    if (nombre != '') {
      filtrar(nombre);
      $("#listado").show();
    }
    else {
      alert("No has introducido ningún nombre");
      $("#listado").hide();
    }
    evt.preventDefault();
  }); 
});