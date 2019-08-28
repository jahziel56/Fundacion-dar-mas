<!DOCTYPE html>
<html>

<?php 
	require"classes/header.php";
 ?>
<main>


<p>How many check boxes do you want when clicked on a radio button?</p>
<input type="radio" name="tab" value="igotnone" onclick="show1();" />
None
<input type="radio" name="tab" value="igottwo" onclick="show2();" />
Two
<div id="div1" class="hide">
  <hr><p>Okay Cool! Here are those two...</p>
<input type="checkbox" value="Yes" name="one">
One
<input type="checkbox" value="Yes" name="two">
Two
</div><br><br><br>




		<label class="titulos-form">78.- ¿Ha manejado esquemas de recursos complementarios?</label><br>
		<div style="font-size: 20px; margin-left:20px;">
			<input type="radio" class="common" name="esquemasRecursosComp" value="Si" onclick="Oculto_5_S();"> Sí
			<input type="radio" class="common" name="esquemasRecursosComp" value="No" onclick="Oculto_5_N();"> No
		</div>

		<div style="background: lightblue;" class="hide" id="Oculto_5">
		<label>78.1.- Con qué organización ha manejado recursos complementarios</label>
		<input type="text" class="common" id="organizacionManejoRecursos" name="organizacionManejoRecursos" placeholder="¿Con qué organización ha manejado recursos complementarios?" value="" required>
		</div>



</main>




<script type="text/javascript">
function show1(){
  document.getElementById('div1').style.display ='none';
}
function show2(){
  document.getElementById('div1').style.display = 'block';
}

function Oculto_5_N(){
  document.getElementById('Oculto_5').classList.remove('Yes_Ver');
}
function Oculto_5_S(){
  document.getElementById('Oculto_5').classList.add('Yes_Ver');
}
</script>