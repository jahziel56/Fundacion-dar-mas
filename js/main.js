function setUpEvent(){
	var btn_cargar = document.getElementById('btn_cargar_usuarios'),
		error_box = document.getElementById('error_box'),
		tabla = document.getElementById('tabla'),
		loader = document.getElementById('loader'),
		btn_cargar_Todos = document.getElementById('btn_ver_mas'),
		btn_cargar_menos = document.getElementById('btn_ver_menos');

	var usuario_nombre,
		usuario_edad,
		usuario_pais,
		usuario_correo;

	function cargarUsuarios(){
		tabla.innerHTML = '<tr><th>ID</th><th>Nombre</th><th>Edad</th><th>Pais</th><th>Correo</th><th>Opciones</th></tr>';

		var peticion = new XMLHttpRequest();
		peticion.open('GET', 'includes/usuarios.php');

		loader.classList.add('active');

		peticion.onload = function(){
			var datos = JSON.parse(peticion.responseText);

			if (datos.error){
				error_box.classList.add('active');
			}else{
				for (var i = 0; i < 5; i++){ 	/* for (var i=0; i < datos.length; i++){ */
					var elemento = document.createElement('tr');
					elemento.innerHTML += ("<td>" + datos[i].id + "</td>");
					elemento.innerHTML += ("<td>" + datos[i].nombre + "</td>");
					elemento.innerHTML += ("<td>" + datos[i].edad + "</td>");
					elemento.innerHTML += ("<td>" + datos[i].pais + "</td>");
					elemento.innerHTML += ("<td>" + datos[i].correo + "</td>");
					elemento.innerHTML += ("<a href='detalle_notificacion.php'><i class='fa fa-eye'></i></a>");					
					tabla.appendChild(elemento);	
				}
			}
		}

		btn_cargar_Todos.classList.add('active');
		peticion.onreadystatechange = function(){
			if (peticion.readyState == 4 && peticion.status == 200) {
				loader.classList.remove('active');
				btn_cargar_menos.classList.remove('active');
			}
		}

		peticion.send();

	} 

	function cargarUsuarios_T(){
		tabla.innerHTML = '<tr><th>ID</th><th>Nombre</th><th>Edad</th><th>Pais</th><th>Correo</th></tr>';

		var peticion = new XMLHttpRequest();
		peticion.open('GET', 'includes/usuarios.php');

		loader.classList.add('active');

		peticion.onload = function(){
			var datos = JSON.parse(peticion.responseText);

			if (datos.error){
				error_box.classList.add('active');
			}else{
				for (var i = 0; i < datos.length; i++){ 	/* for (var i=0; i < datos.length; i++){ */
					var elemento = document.createElement('tr');
					elemento.innerHTML += ("<td>" + datos[i].id + "</td>");
					elemento.innerHTML += ("<td>" + datos[i].nombre + "</td>");
					elemento.innerHTML += ("<td>" + datos[i].edad + "</td>");
					elemento.innerHTML += ("<td>" + datos[i].pais + "</td>");
					elemento.innerHTML += ("<td>" + datos[i].correo + "</td>");
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
}	

window.onload = function(){
	setUpEvent();
};