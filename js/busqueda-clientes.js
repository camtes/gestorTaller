function filtrar(nombre) {
  var count = 0;
  $('#listado tbody tr').each(function () {
    $(this).children(".name").each(function () {
      var nombre_aux = $(this).val().toLowerCase();
      if ( nombre != nombre_aux ) { $(this).parent().hide(); } 
      else { count++; }
    });
  });
  
  if ( count == 0 ) { alert("El nombre no coincide con ningún cliente"); }
}

$(document).ready(function() {
  $("#buscar").on('click', function() {
    var nombre = $("input#b-name").val().toLowerCase();
    if (nombre != '') {
      filtrar(nombre);
    }else {
      alert("No has introducido ningún nombre");
    }
  }); 
});

//formulario
/*
<form action="" method="">
  <input type="text" name="b-name" size=30 maxlength="50" required>
  <input type="submit" id="buscar" name="buscar" value="Buscar" ></td>
</form>
*/