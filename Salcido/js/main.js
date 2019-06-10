var btn_cargar = document.getElementById('btn_cargar_usuarios'),
	error_box = document.getElementById('error_box'),
	tabla = document.getElementById('tabla'),
	loader = document.getElementById('loader'),
	btn_cargar_Todos = document.getElementById('btn_ver_mas'),
	btn_cargar_menos = document.getElementById('btn_ver_menos');


function cargarUsuarios(){
	tabla.innerHTML = '<tr><th>ID</th><th>nombreOSC</th><th>mision</th><th>vision</th><th>areasAtencion</th><th>rfcHomoclave</th><th>CLUNI</th><th>email</th><th>Opciones</th></tr>';

	var peticion = new XMLHttpRequest();
	peticion.open('GET', 'php/usuarios.php');

	loader.classList.add('active');

	peticion.onload = function(){
		var datos = JSON.parse(peticion.responseText);

		if (datos.length > 5) {
			btn_cargar_Todos.classList.add('active');	
		}

		if (datos.error){
			error_box.classList.add('active');
			error_box.innerHTML = 'Error:';
		}else{
			for (var i = 0; i < 5; i++){ 	/* for (var i=0; i < datos.length; i++){ */
				var elemento = document.createElement('tr');
				elemento.innerHTML += ("<td>" + datos[i].ID + "</td>");
				elemento.innerHTML += ("<td>" + datos[i].nombreOSC + "</td>");
				elemento.innerHTML += ("<td>" + datos[i].mision + "</td>");
				elemento.innerHTML += ("<td>" + datos[i].vision + "</td>");
				elemento.innerHTML += ("<td>" + datos[i].areasAtencion + "</td>");
				elemento.innerHTML += ("<td>" + datos[i].rfcHomoclave + "</td>");
				elemento.innerHTML += ("<td>" + datos[i].CLUNI + "</td>");
				elemento.innerHTML += ("<td>" + datos[i].email + "</td>");
				elemento.innerHTML += ("<a href='detalle_notificacion.php'><i class='fa fa-eye'>" + datos[i].ID + "</i></a>");					
				tabla.appendChild(elemento);	
			}
		}
	}



	peticion.onreadystatechange = function(){
		if (peticion.readyState == 4 && peticion.status == 200) {
			loader.classList.remove('active');
			btn_cargar_menos.classList.remove('active');
		}
	}

	peticion.send();
} 

function cargarUsuarios_T(){
	tabla.innerHTML = '<tr><th>ID</th><th>nombreOSC</th><th>mision</th><th>vision</th><th>areasAtencion</th><th>rfcHomoclave</th><th>CLUNI</th><th>email</th><th>Opciones</th></tr>';

	var peticion = new XMLHttpRequest();
	peticion.open('GET', 'php/usuarios.php');

	loader.classList.add('active');

	peticion.onload = function(){
		var datos = JSON.parse(peticion.responseText);

		if (datos.error){
			error_box.classList.add('active');
		}else{
			for (var i = 0; i < datos.length; i++){ 	/* for (var i=0; i < datos.length; i++){ */
				var elemento = document.createElement('tr');
				elemento.innerHTML += ("<td>" + datos[i].ID + "</td>");
				elemento.innerHTML += ("<td>" + datos[i].nombreOSC + "</td>");
				elemento.innerHTML += ("<td>" + datos[i].mision + "</td>");
				elemento.innerHTML += ("<td>" + datos[i].vision + "</td>");
				elemento.innerHTML += ("<td>" + datos[i].areasAtencion + "</td>");
				elemento.innerHTML += ("<td>" + datos[i].rfcHomoclave + "</td>");
				elemento.innerHTML += ("<td>" + datos[i].CLUNI + "</td>");
				elemento.innerHTML += ("<td>" + datos[i].email + "</td>");
				elemento.innerHTML += ("<a href='detalle_notificacion.php'><i class='fa fa-eye'></i></a>");					
				tabla.appendChild(elemento);	
			}
		}
	}

	btn_cargar_menos.classList.add('active');
	peticion.onreadystatechange = function(){
		if (peticion.readyState == 4 && peticion.status == 200) {
			loader.classList.remove('active');
			btn_cargar_Todos.classList.remove('active');
		}
	}

	peticion.send();

} 

btn_cargar.addEventListener('click', function(){
	cargarUsuarios();

});
btn_cargar_Todos.addEventListener('click', function(){
	cargarUsuarios_T();

});
btn_cargar_menos.addEventListener('click', function(){
	cargarUsuarios();

});

function ajaxCall() { 
  var modal = $("#myModal");
  var modalBody = $('.modal-body');

  $.get('php/usuarios.php')
  .done(function(res) {
    modalBody.html(table(res[0]));
    modal.modal('show');
  })
  .fail(function(err) {
     modalBody.html("Error: "  + err);
  });
}

function table(obj) {
  var tabl = "<table class='table table-responsive'><th>Company</th><th>Phone</th><th>Address</th>";
  var tr = '<tbody><tr>';
  tr +="<td>"+obj['ID']+"</td>";
  tr +="<td>"+obj['nombreOSC']+"</td>";
  tr +="<td>"+obj['mision']+"</td>";
  tr += "</tr>";
  tabl += tr + "</tbody></table>";
  return tabl;


}





function formulario_valido(){
	if (usuario_nombre == '') {
		return false;
	}else if (isNaN(usuario_edad)) {
		alert("Error: edad no valida");
		return false;
	}else if (usuario_pais == '') {
		return false;	
	}else if (usuario_correo == '') {
		return false;
	}
	return true;
}