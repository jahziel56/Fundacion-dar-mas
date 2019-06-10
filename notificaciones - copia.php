<?php
/* manda a llamar a header.php */ 
	require"header.php";
?>
	<main>
		<div class="conten-alignt-center">

			<h2 style="text-align: center;">Notificaciones</h2>
			<hr style="margin: 20px 0">

			<div style="box-sizing: border-box;">
			<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet" />

				<div class="contenedor">
					<div class="notification-panel Succes ">
						<label>Succes</label>
						<a href="index.php" style="text-decoration: none; cursor: pointer; background: ">
					    <div class="notification">
					        <div class="n-icon"></div>
					        <div class="n-date">23/5/2018 - 25/5/2018</div>
					        <div class="n-title">Task 01 - Second pass</div>
					        <div class="n-description">Enter long-ass description about what we are going to do here hahaha.</div>
					    </div>
					    </a>
					    <div class="notification">
					        <div class="n-icon"></div>
					        <div class="n-date">23/5/2018</div>
					        <div class="n-title">NZ02</div>
					        <div class="n-description">My second zone.</div>
					    </div>
					</div>

					<div class="notification-panel Succes">
						<label>Alert</label>
						<a href="index.php" style="text-decoration: none; cursor: pointer;">
					    <div class="notification">
					        <div class="n-icon"></div>
					        <div class="n-date">23/5/2018 - 25/5/2018</div>
					        <div class="n-title">Task 01 - Second pass</div>
					        <div class="n-description">Enter long-ass description about what we are going</div>
					    </div>
					    </a>
					    <div class="notification">
					        <div class="n-icon"></div>
					        <div class="n-date">23/5/2018</div>
					        <div class="n-title">NZ02</div>
					        <div class="n-description">My second zone.</div>
					    </div>
					</div>

					<div class="notification-panel Succes">
						<label>Error</label>
						<a href="index.php" style="text-decoration: none; cursor: pointer;">
					    <div class="notification">
					        <div class="n-icon"></div>
					        <div class="n-date">23/5/2018 - 25/5/2018</div>
					        <div class="n-title">Task 01 - Second pass</div>
					        <div class="n-description">Enter long-ass description about what we are going</div>
					    </div>
					    </a>
					    <div class="notification">
					        <div class="n-icon"></div>
					        <div class="n-date">23/5/2018</div>
					        <div class="n-title">NZ02</div>
					        <div class="n-description">My second zone.</div>
					    </div>
					</div>
				</div>

			</div>
		</div>
	</main>



	<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>


<?php
/* manda a llamar a footer.php */ 
	require"footer.php";

/* el   header.php / index.php / footer.php   son en esencia una sola pagina php, se hace de esta forma para reutilizar codigo de forma facil y rapida */
?>