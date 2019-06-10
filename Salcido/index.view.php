<?php

$municipiosDeSonora = [
  'Aconchi', 'Agua Prieta', 'Alamos', 'Altar', 'Arivechi', 'Arizpe', 'Atil',
  'Bacadéhuachi', 'Bacanora', 'Bacerac', 'Bacoachi', 'Bácum', 'Banámichi', 'Baviácora',
  'Bavispe', 'Benito Juárez', 'Benjamín Hill', 'Caborca', 'Cajeme', 'Cananea', 'Carbó',
  'Cucurpe', 'Cumpas', 'Divisaderos', 'Empalme', 'Etchojoa', 'Fronteras', 'General Plutarco Elías Calles',
  'Granados', 'Guaymas', 'Hermosillo', 'Huachinera', 'Huásabas', 'Huatabampo', 'Huépac',
  'Imuris', 'La Colorada', 'Magdalena', 'Mazatán', 'Moctezuma', 'Naco', 'Nácori Chico',
  'Nacozari de García', 'Navojoa', 'Nogales', 'Onavas', 'Opodepe', 'Oquitoa', 'Pitiquito',
  'Puerto Peñasco', 'Quiriego', 'Rayón', 'Rosario', 'Sahuaripa', 'San Felipe de Jesús', 'San Ignacio Río Muerto',
  'San Javier', 'San Luis Río Colorado', 'San Miguel de Horcasitas', 'San Pedro de la Cueva', 'Santa Ana', 'Santa Cruz', 'Sáric',
  'Soyopa', 'Suaqui Grande', 'Tepache', 'Trincheras', 'Tubutama', 'Ures', 'Villa Hidalgo',
  'Villa Pesqueira', 'Yécora'
];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Formulario de Contacto</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="wrap">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">

        <input type="text" class="form-control" id="nombreOSC" name="nombreOSC"
          placeholder="Nombre de la OSC (tal cómo está escrita en su OSC):" value="<?php if(!$enviado && isset($nombreOSC)) echo $nombreOSC ?>">

        <input type="text" class="form-control" id="objetoSocialOrganizacion" name="objetoSocialOrganizacion"
          placeholder="Objeto social de la organización:"
          value="<?php if(!$enviado && isset($objetoSocialOrganizacion)) echo $objetoSocialOrganizacion ?>">

        <textarea name="mision" class="form-control" id="mision" placeholder="Misión:"><?php if(!$enviado && isset($mision)) echo $mision ?></textarea>
        <textarea name="vision" class="form-control" id="vision" placeholder="Visión:"><?php if(!$enviado && isset($vision)) echo $vision ?></textarea>
        <textarea name="areasAtencion" class="form-control" id="areasAtencion" placeholder="Áreas de atención de la OSC:"><?php if(!$enviado && isset($areasAtencion)) echo $areasAtencion ?></textarea>

        <input type="text" class="form-control" id="rfcHomoclave" name="rfcHomoclave"
          placeholder="RFC con homoclave de la organización:"
          value="<?php if(!$enviado && isset($rfcHomoclave)) echo $rfcHomoclave ?>">

        <label class="form-control">RFC (PDF o JPG)</label>
        <br/>

        <input type="file" class="form-control" name="files[]">
        <br/>
        <br/>

        <input type="text" class="form-control" id="CLUNI" name="CLUNI"
          placeholder="CLUNI (Si no se tiene, ingresar PRE-FOLIO otorgado)"
          value="<?php if(!$enviado && isset($CLUNI)) echo $CLUNI ?>">

        <label class="form-control">CLUNI (PDF o JPG)</label>
        <br/>

        <input type="file" class="form-control" name="files[]">
        <br>
        <br>

        <input type="text" class="form-control" id="calle" name="calle"
          placeholder="Calle del domicilio:"
          value="<?php if(!$enviado && isset($calle)) echo $calle ?>">

        <input type="text" class="form-control" id="numero" name="numero"
          placeholder="Número del domicilio:"
          value="<?php if(!$enviado && isset($numero)) echo $numero ?>">

        <input type="text" class="form-control" id="colonia" name="colonia"
          placeholder="Colonia del domicilio:"
          value="<?php if(!$enviado && isset($colonia)) echo $colonia ?>">

        <input type="text" class="form-control" id="codigoPostal" name="codigoPostal"
          placeholder="Codigo postal del domicilio:"
          value="<?php if(!$enviado && isset($codigoPostal)) echo $codigoPostal ?>">

        <input type="text" class="form-control" id="localidad" name="localidad"
          placeholder="Localidad del domicilio:"
          value="<?php if(!$enviado && isset($localidad)) echo $localidad ?>">

        <input type="text" class="form-control" id="municipio" name="municipio"
          placeholder="Municipio del domicilio:"
          value="<?php if(!$enviado && isset($municipio)) echo $municipio ?>">

        <input type="text" class="form-control" id="phoneOficina" name="phoneOficina"
          placeholder="Teléfono de la oficina (con lada):"
          value="<?php if(!$enviado && isset($phoneOficina)) echo $phoneOficina ?>">

        <input type="text" class="form-control" id="phoneCelular" name="phoneCelular"
          placeholder="Teléfono celular (con lada):"
          value="<?php if(!$enviado && isset($phoneCelular)) echo $phoneCelular ?>">

        <input type="email" class="form-control" id="emailContacto" name="emailContacto"
          placeholder="Correo de contacto de la organización:"
          value="<?php if(!$enviado && isset($emailContacto)) echo $emailContacto ?>">

        <input type="url" class="form-control" id="paginaWeb" name="paginaWeb"
          placeholder="Página web de la organización:"
          value="<?php if(!$enviado && isset($paginaWeb)) echo $paginaWeb ?>">

        <input type="text" class="form-control" id="organizacionFB" name="organizacionFB"
          placeholder="Facebook de la organización:"
          value="<?php if(!$enviado && isset($organizacionFB)) echo $organizacionFB ?>">

        <input type="text" class="form-control" id="organizacionTW" name="organizacionTW"
          placeholder="Twitter de la organización:"
          value="<?php if(!$enviado && isset($organizacionTW)) echo $organizacionTW ?>">

        <input type="text" class="form-control" id="organizacionInsta" name="organizacionInsta"
          placeholder="Instagram de la organización:"
          value="<?php if(!$enviado && isset($organizacionInsta)) echo $organizacionInsta ?>">

                                <!--AQUI TERMINA LA SECCION FORMULARIO PRINCIPAL-->
                                <!--AQUI EMPIEZA LA SECCÍON HISTORIAL DE LA ORGANIZACION-->

        <label class="titulos-form">Historial de la organización</label>
        <br/>
        <br/>

        <label class="titulos-form">Fecha de constitución de la OSC</label>
        <br/>
        <br/>

        <input type="date" class="form-control" id="fechaConstitucionOSC" name="fechaConstitucionOSC"
          value="<?php if(!$enviado && isset($fechaConstitucionOSC)) echo $fechaConstitucionOSC ?>">

        <input type="text" class="form-control" id="nombreNotario" name="nombreNotario"
          placeholder="Nombre del notario público:"
          value="<?php if(!$enviado && isset($nombreNotario)) echo $nombreNotario ?>">

        <input type="text" class="form-control" id="numeroNotario" name="numeroNotario"
          placeholder="Número del notario público:"
          value="<?php if(!$enviado && isset($numeroNotario)) echo $numeroNotario ?>">

        <label class="form-control">Municipio de la notaría pública</label>
        <br>
        <br>

        <select class="form-control" name="municipioNotaria"
          value="<?php if(!$enviado && isset($municipioNotaria)) echo $municipioNotaria ?>">
          <?php foreach($municipiosDeSonora as $municipio) {?>
  							<option><?php echo $municipio?></option>
  				<?php } ?>
        </select>
        <br>
        <br>

        <input type="text" class="form-control" id="noEstrituraPublica" name="noEstrituraPublica"
          placeholder="Número de estritura pública:"
          value="<?php if(!$enviado && isset($noEstrituraPublica)) echo $noEstrituraPublica ?>">

        <input type="text" class="form-control" id="volumenEstrituraPublica" name="volumenEstrituraPublica"
          placeholder="Volumen de estritura pública:"
          value="<?php if(!$enviado && isset($volumenEstrituraPublica)) echo $volumenEstrituraPublica ?>">

        <label class="titulos-form">Fecha de estritura pública</label>
        <br/>
        <br/>

        <input type="date" class="form-control" id="fechaEstritura" name="fechaEstritura"
          value="<?php if(!$enviado && isset($fechaEstritura)) echo $fechaEstritura ?>">

        <label class="titulos-form">Acta constitutiva</label>
        <br/>

        <input type="file" class="form-control" name="files[]">
        <br>
        <br>

        <label class="titulos-form">Acta protocolizada donde conste la representación legal vigente</label>
        <br/>

        <input type="file" class="form-control" name="files[]">
        <br>
        <br>

        <label class="form-control">Municipio donde se registró la OSC</label>
        <br>
        <br>

        <select class="form-control" name="municipioRegistroOSC"
          value="<?php if(!$enviado && isset($municipioRegistroOSC)) echo $municipioRegistroOSC ?>">
          <?php foreach($municipiosDeSonora as $municipio) {?>
  							<option><?php echo $municipio?></option>
  				<?php } ?>
        </select>
        <br>
        <br>

        <input type="text" class="form-control" id="estaResideOSC" name="estaResideOSC"
          placeholder="Nombre del estado donde reside la OSC:"
          value="<?php if(!$enviado && isset($estaResideOSC)) echo $estaResideOSC ?>">

        <input type="text" class="form-control" id="muniResideOSC" name="muniResideOSC"
          placeholder="Nombre del municipio donde reside la OSC:"
          value="<?php if(!$enviado && isset($muniResideOSC)) echo $muniResideOSC ?>">

        <input type="text" class="form-control" id="principalesLogros" name="principalesLogros"
          placeholder="Principales logros en el último año (2018):"
          value="<?php if(!$enviado && isset($principalesLogros)) echo $principalesLogros ?>">

        <input type="text" class="form-control" id="metasOrganización" name="metasOrganización"
          placeholder="Metas de la organización para el presente año (2019):"
          value="<?php if(!$enviado && isset($metasOrganización)) echo $metasOrganización ?>">

        <label class="form-control">¿Está autorizada para recibir donativos deducibles de impuestos?</label>
        <br>

        <input type="radio" class="form-control" name="autorizadaDeducible" value="Sí" checked> Sí
        <input type="radio" class="form-control" name="autorizadaDeducible" value="No"> No <br><br>

        <label class="form-control">Su organización se rige o es dirigida por: </label>
        <br>

        <input type="radio" class="form-control" name="digiridaPor" value="Patronato" checked> Patronato <br>
        <input type="radio" class="form-control" name="digiridaPor" value="Consejo Directivo"> Consejo directivo <br>
        <input type="radio" class="form-control" name="digiridaPor" value="Otro"> Patronato <br><br>

        <input type="text" class="form-control" id="nombreRepresentante" name="nombreRepresentante"
          placeholder="Nombre del representante legal vigente:"
          value="<?php if(!$enviado && isset($nombreRepresentante)) echo $nombreRepresentante ?>">

        <input type="text" class="form-control" id="idRepresentante" name="idRepresentante"
          placeholder="Número de identificación oficial del representante legal vigente:"
          value="<?php if(!$enviado && isset($idRepresentante)) echo $idRepresentante ?>">

        <label class="form-control">INE del representante legal vigente</label>
        <br>
        <br>

        <input type="file" class="form-control" name="files[]">
        <br>
        <br>

        <input type="text" class="form-control" id="nombrePresi" name="nombrePresi"
          placeholder="Nombre del presidente y/o director general:"
          value="<?php if(!$enviado && isset($nombrePresi)) echo $nombrePresi ?>">

        <input type="text" class="form-control" id="nombreCoordi" name="nombreCoordi"
          placeholder="Nombre del coordinador que somete a la convocatoria:"
          value="<?php if(!$enviado && isset($nombreCoordi)) echo $nombreCoordi ?>">

        <label class="form-control">INE del coordinador del proyecto</label>
        <br>
        <br>

        <input type="file" class="form-control" name="files[]">
        <br>
        <br>

        <input type="email" class="form-control" id="correoCoordinador" name="correoCoordinador"
          placeholder="Correo electrónico personal del coordinador del proyecto"
          value="<?php if(!$enviado && isset($correoCoordinador)) echo $correoCoordinador ?>">

        <input type="text" class="form-control" id="cargoCoordinador" name="cargoCoordinador"
          placeholder="Cargo o puesto del coordinador del proyecto"
          value="<?php if(!$enviado && isset($cargoCoordinador)) echo $cargoCoordinador ?>">

        <input type="text" class="form-control" id="numeroEmpleados" name="numeroEmpleados"
          placeholder="Número de empleados de la organización"
          value="<?php if(!$enviado && isset($numeroEmpleados)) echo $numeroEmpleados ?>">

        <input type="text" class="form-control" id="numeroVoluntarios" name="numeroVoluntarios"
          placeholder="Número de voluntarios de la organización"
          value="<?php if(!$enviado && isset($numeroVoluntarios)) echo $numeroVoluntarios ?>">

        <input type="text" class="form-control" id="principalesAlianzas" name="principalesAlianzas"
          placeholder="Mencione las principales alianzas con las que cuenta"
          value="<?php if(!$enviado && isset($principalesAlianzas)) echo $principalesAlianzas ?>">

        <input type="text" class="form-control" id="numeroBeneficiados" name="numeroBeneficiados"
          placeholder="Número de personas que benefició el año pasado"
          value="<?php if(!$enviado && isset($numeroBeneficiados)) echo $numeroBeneficiados ?>">

        <label class="titulos-form">¿Tiene observaciones en su 32 D?</label>
        <br>

        <input type="radio" class="form-control" name="observaciones32D" value="Sí" checked> Sí
        <input type="radio" class="form-control" name="observaciones32D" value="No"> No <br><br>

        <label class="form-control">32D en positivio y con 30 días de expedición como máximo</label>
        <br>
        <br>

        <input type="file" class="form-control" name="files[]">
        <br>
        <br>

        <label class="titulos-form">¿Ha presentado en tiempo y forma la declaración por ejercicio, de impuestos federales?</label>
        <br>

        <input type="radio" class="form-control" name="tiempoYforma" value="Sí" checked> Sí
        <input type="radio" class="form-control" name="tiempoYforma" value="No"> No <br><br>

        <label class="titulos-form">¿Tiene adeudos fiscales a cargo, por impuestos federales?</label>
        <br>

        <input type="radio" class="form-control" name="tieneAdeudos" value="Sí" checked> Sí
        <input type="radio" class="form-control" name="tieneAdeudos" value="No"> No <br><br>

        <label class="form-control">F21, preferentemente 2018 o más reciente</label>
        <br>
        <br>

        <input type="file" class="form-control" name="files[]">
        <br>
        <br>

        <label class="form-control">Constancia de Situación Fiscal</label>
        <br>
        <br>

        <input type="file" class="form-control" name="files[]">
        <br>
        <br>

        <label class="form-control">Comprobante de cuenta bancaria</label>
        <br>
        <br>

        <input type="file" class="form-control" name="files[]">
        <br>
        <br>

        <label class="form-control">Factura cancelada</label>
        <br>
        <br>

        <input type="file" class="form-control" name="files[]">
        <br>
        <br>

        <label class="titulos-form">¿Está inscrita en el Directorio Nacional de Instituciones de Asistencia Social?</label>
        <br>

        <input type="radio" class="form-control" name="inscritaDNIAS" value="Sí" checked> Sí
        <input type="radio" class="form-control" name="inscritaDNIAS" value="No"> No <br><br>

        <label class="form-control">DNIAS</label>
        <br>
        <br>

        <input type="file" class="form-control" name="files[]">
        <br>
        <br>
                                <!--AQUI TERMINA LA SECCION HISTORIAL DE LA ORGANIZACION-->
                                <!--AQUI EMPIEZA LA SECCÍON ACTA CONSTITUTIVA-->

        <label class="titulos-form">Registro público del Acta Constitutiva</label>
        <br>
        <br>

        <input type="text" class="form-control" id="numeroLibro" name="numeroLibro"
          placeholder="Número de libro:"
          value="<?php if(!$enviado && isset($numeroLibro)) echo $numeroLibro ?>">

        <input type="text" class="form-control" id="numeroInscripcion" name="numeroInscripcion"
          placeholder="Número de inscrpción:"
          value="<?php if(!$enviado && isset($numeroInscripcion)) echo $numeroInscripcion ?>">

        <input type="text" class="form-control" id="volumenICRESON" name="volumenICRESON"
          placeholder="Volúmen ICRESON:"
          value="<?php if(!$enviado && isset($volumenICRESON)) echo $volumenICRESON ?>">

        <label class="titulos-form">RPP ICRESON</label>
        <br/>

        <input type="file" class="form-control" name="files[]">
        <br>
        <br>

        <label class="titulos-form">¿Su organización ha tenido modificaciones a su acta constitutiva?</label>
        <br>

        <input type="radio" class="form-control" name="existenModis" value="Sí" checked> Sí
        <input type="radio" class="form-control" name="existenModis" value="No"> No <br><br>

        <label class="form-control">Fecha de la última modificación del acta constitutiva</label>
        <br>

        <input type="date" class="form-control" id="ultimaModi" name="ultimaModi"
          value="<?php if(!$enviado && isset($ultimaModi)) echo $ultimaModi ?>">

        <input type="text" class="form-control" id="numeroActaConsti" name="numeroActaConsti"
          placeholder="Número de acta constitutiva:"
          value="<?php if(!$enviado && isset($numeroActaConsti)) echo $numeroActaConsti ?>">

        <input type="text" class="form-control" id="volumenActaConsti" name="volumenActaConsti"
          placeholder="Volúmen de acta constitutiva:"
          value="<?php if(!$enviado && isset($volumenActaConsti)) echo $volumenActaConsti ?>">

        <label class="form-control">Ultima acta modificatoria protocolizada</label>
        <br/>

        <input type="file" class="form-control" name="files[]">
        <br>
        <br>

        <label class="form-control">RPP ICRESON de la última acta modificatoria actualizada</label>
        <br/>

        <input type="file" class="form-control" name="files[]">
        <br>
        <br>
                                    <!--AQUI TERMINA LA SECCION ACTA CONSTITUTIVA-->
                                    <!--AQUI EMPIEZA LA SECCION DONATARIA AUTORIZADA-->

        <label class="titulos-form">Donataria autorizada</label>
        <br>
        <br>

        <label class="form-control">Fecha de publicación en el Diario Oficial de la Federación</label>
        <br>

        <input type="date" class="form-control" id="fechaDiario" name="fechaDiario"
          value="<?php if(!$enviado && isset($fechaDiario)) echo $fechaDiario ?>">

        <input type="text" class="form-control" id="numeroDiario" name="numeroDiario"
          placeholder="Número de página del Diario Oficial de la Federación"
          value="<?php if(!$enviado && isset($numeroDiario)) echo $numeroDiario ?>">

        <label class="form-control">Página del DOF donde se publicó su autorización</label>
        <br>
        <br>

        <input type="file" class="form-control" name="files[]">
        <br>
        <br>

        <label class="form-control">¿El SAT ha detenido su autorización como donataria en algún momento?</label>
        <br>

        <input type="radio" class="form-control" name="detenidoAutorizado" value="Sí" checked> Sí
        <input type="radio" class="form-control" name="detenidoAutorizado" value="No"> No <br><br>

        <input type="text" class="form-control" id="razonDetenido" name="razonDetenido"
          placeholder="¿Por qué detuvo el SAT su autorización?"
          value="<?php if(!$enviado && isset($razonDetenido)) echo $razonDetenido ?>">

        <label class="form-control">¿Desde que fecha está autorizada para recibir donativos deducibles de impuestos?</label>
        <br>

        <input type="date" class="form-control" id="fechaAutorizada" name="fechaAutorizada"
          value="<?php if(!$enviado && isset($fechaAutorizada)) echo $fechaAutorizada ?>">

                                <!--AQUI TERMINA LA SECCION DONATARIA AUTORIZADA-->
                                <!--AQUI EMPIEZA LA SECCÍON RECURSOS COMPLEMENTARIOS-->

        <label class="titulos-form">Población que atiende la OSC</label>
        <br>
        <br>

        <input type="text" class="form-control" id="poblacion_0_4" name="poblacion_0_4"
          placeholder="0 a 4 años"
          value="<?php if(!$enviado && isset($poblacion_0_4)) echo $poblacion_0_4 ?>">

        <input type="text" class="form-control" id="poblacion_5_14" name="poblacion_5_14"
          placeholder="5 a 14 años"
          value="<?php if(!$enviado && isset($poblacion_5_14)) echo $poblacion_5_14 ?>">

        <input type="text" class="form-control" id="poblacion_15_29" name="poblacion_15_29"
          placeholder="15 a 29 años"
          value="<?php if(!$enviado && isset($poblacion_15_29)) echo $poblacion_15_29 ?>">

        <input type="text" class="form-control" id="poblacion_30_44" name="poblacion_30_44"
          placeholder="30 a 44 años"
          value="<?php if(!$enviado && isset($poblacion_30_44)) echo $poblacion_30_44 ?>">

        <input type="text" class="form-control" id="poblacion_45_64" name="poblacion_45_64"
          placeholder="45 a 64 años"
          value="<?php if(!$enviado && isset($poblacion_45_64)) echo $poblacion_45_64 ?>">

        <input type="text" class="form-control" id="poblacion_65_mas" name="poblacion_65_mas"
          placeholder="45 a 64 años"
          value="<?php if(!$enviado && isset($poblacion_65_mas)) echo $poblacion_65_mas ?>">

        <label class="titulos-form">¿Ha manejado esquemas de recursos complementarios?</label>
        <br>

        <input type="radio" class="form-control" name="esquemasRecursosComp" value="Sí" checked> Sí
        <input type="radio" class="form-control" name="esquemasRecursosComp" value="No"> No <br><br>

        <input type="text" class="form-control" id="organizacionManejoRecursos" name="organizacionManejoRecursos"
          placeholder="¿Con qué organización ha manejado recursos complementarios?"
          value="<?php if(!$enviado && isset($organizacionManejoRecursos)) echo $organizacionManejoRecursos ?>">

                                <!--AQUI TERMINA LA SECCION RECURSOS COMPLEMENTARIOS-->
                                <!--AQUI EMPIEZA LA SECCÍON PROYECTO-->

        <label class="titulos-form">Proyecto</label>
        <br>
        <br>

        <input type="text" class="form-control" id="nombreProyecto" name="nombreProyecto"
          placeholder="Nombre del proyecto"
          value="<?php if(!$enviado && isset($nombreProyecto)) echo $nombreProyecto ?>">

        <label class="form-control">Carencias sociales que desea atender</label>
        <br>

        <select class="form-control" name="carenciaSocial"
          value="<?php if(!$enviado && isset($carenciaSocial)) echo $carenciaSocial ?>">
          <option value="Educación">Educación</option>
          <option value="Salud">Salud</option>
          <option value="Vivienda">Vivienda</option>
          <option value="Alimentación">Alimentación</option>
          <option value="Servicios básicos">Servicios básicos</option>
          <option value="Otros">Ninguna de las anteriores</option>
        </select>
        <br>
        <br>

        <label class="form-control">¿A qué objetivo de desarrollo sostenible al que se dirige su proyecto?</label>
        <br>

        <select class="form-control" name="objetivoDesarrolloSus"
          value="<?php if(!$enviado && isset($objetivoDesarrolloSus)) echo $objetivoDesarrolloSus ?>">
          <option value="Fin de la pobreza">Fin de la pobreza</option>
          <option value="Hambre cero">Hambre Cero</option>
          <option value="Salud y bienestar">Salud y bienestar</option>
          <option value="Educación de calidad">Educacion de calidad</option>
          <option value="Igualdad de género">Igualdad de género</option>
          <option value="Agua limpia y saneamiento">Agua limpia y saneamiento</option>
          <option value="Energía asequible y limpia">Energía asequible y limpia</option>
          <option value="Trabajo decente y crecimiento económico">Trabajo decente y crecimiento económico</option>
          <option value="Industria innovacion e infraestructura">Industria innovacion e infraestructura</option>
          <option value="Reducción de desigualdades">Reducción de desigualdades</option>
          <option value="Ciudades y comunidades sostenibles">Ciudades y comunidades sostenibles</option>
          <option value="Producción y consumos responsables">Producción y consumos responsables</option>
          <option value="Acción por el clima">Acción por el clima</option>
          <option value="Vida submarina">Vida submarina</option>
          <option value="Vida de ecosistemas terrestres">Vida de ecosistemas terrestres</option>
          <option value="Paz, justicia e instituciones sociales">Paz, justicia e instituciones sociales</option>
          <option value="Alianzas para lograr objetivos">Alianzas para lograr objetivos</option>
        </select>
        <br>
        <br>

        <label class="form-control">Tema de la convocatoria en la que participa su proyecto</label>
        <br>
        <select class="form-control" name="temaConvocatoria"
          value="<?php if(!$enviado && isset($temaConvocatoria)) echo $temaConvocatoria ?>">
          <option value="Capacitación y talleres para el desarrollo de capacidades productivas para el autoempleo">Capacitación y talleres para el desarrollo de capacidades productivas para el autoempleo</option>
          <option value="Atención a migrantes">Atención a migrantes</option>
          <option value="Apoyo a la operación de casas hogar y albergues">Apoyo a la operación de casas hogar y albergues</option>
          <option value="Fomento a la educación física, cultural y artística">Fomento a la educación física, cultural y artística</option>
          <option value="Prevención y atención a la violencia contra las mujeres">Prevención y atención a la violencia contra las mujeres</option>
          <option value="Seguridad alimentaria y nutrición">Seguridad alimentaria y nutrición</option>
          <option value="Investigación en materia de derechos sociales">Investigación en materia de derechos sociales</option>
          <option value="Inclusión, equidad de genero, atención y apoyos a población vulnerable">Inclusión, equidad de genero, atención y apoyos a población vulnerable</option>
          <option value="Prevención y tratamiento de adicciones">Prevención y tratamiento de adicciones</option>
          <option value="Acceso a servicios de salud de calidad">Acceso a servicios de salud de calidad</option>
          <option value="Asesorias acádemicas para mejorar el aprovechamiento escolar">Asesorias acádemicas para mejorar el aprovechamiento escolar</option>
          <option value="Desarrollo juvenil">Desarrollo juvenil</option>
        </select>
        <br>
        <br>

        <label class="form-control">¿En qué tema de derecho social se desarrolla su proyecto?</label>
        <br>
        <select class="form-control" name="temaDerechoSocial"
          value="<?php if(!$enviado && isset($temaDerechoSocial)) echo $temaDerechoSocial ?>">
          <option value="Salud">Salud</option>
          <option value="Asistencia y seguridad social">Asistencia y seguridad social</option>
          <option value="Educación">Educación</option>
          <option value="Desarrollo urbano y viviendia">Desarrollo urbano y viviendia</option>
          <option value="Deporte">Deporte</option>
          <option value="Cultura">Cultura</option>
          <option value="Desarollo regional sustentable">Desarollo regional sustentable</option>
          <option value="Financiamiento para el desarollo">Financiamiento para el desarollo</option>
          <option value="Equidad de género">Equidad de género</option>
          <option value="Atención a pueblos indigenas">Atención a pueblos indigenas</option>
          <option value="Juventud">Juventud</option>
          <option value="Adultos mayores">Adultos mayores</option>
        </select>
        <br>
        <br>

        <input type="text" class="form-control" id="problemaSocial" name="problemaSocial"
          placeholder="Describa el problema social al que desea contribuir o atender"
          value="<?php if(!$enviado && isset($problemaSocial)) echo $problemaSocial ?>">

        <input type="text" class="form-control" id="objetivoGeneral" name="objetivoGeneral"
          placeholder="Objetivo general del proyecto, lo que quieres lograr, no las acciones a realizar"
          value="<?php if(!$enviado && isset($objetivoGeneral)) echo $objetivoGeneral ?>">

        <input type="text" class="form-control" id="descripcionProyecto" name="descripcionProyecto"
          placeholder="Describa como desarrollará su trabajo, actividades, procedimiento de selección y participación"
          value="<?php if(!$enviado && isset($descripcionProyecto)) echo $descripcionProyecto ?>">

        <input type="text" class="form-control" id="criteriosIdentificar" name="criteriosIdentificar"
          placeholder="Criterios para identificar y seleccionar a los beneficiarios"
          value="<?php if(!$enviado && isset($criteriosIdentificar)) echo $criteriosIdentificar ?>">

                                <!--AQUI TERMINA LA SECCION PROYECTO-->
                                <!--AQUI EMPIEZA LA SECCÍON METAS-->

        <label class="titulos-form">Metas</label>
        <br>
        <br>

        <input type="text" class="form-control" id="primerMeta" name="primerMeta"
          placeholder="Describa la meta número 1"
          value="<?php if(!$enviado && isset($primerMeta)) echo $primerMeta ?>">

        <label class="form-control">Tipo de producto o servicio 1:</label>
        <br>
        <select class="form-control" name="tipoProductoUno"
          value="<?php if(!$enviado && isset($tipoProductoUno)) echo $tipoProductoUno ?>">
          <option value="Alimentación">Alimentación</option>
          <option value="Apoyos">Apoyos</option>
          <option value="Asesoria grupal">Asesoria grupal</option>
          <option value="Capacitación">Capacitación</option>
          <option value="Consultas medicas">Consultas medicas</option>
          <option value="Estudios y analisis clinicos">Estudios y analisis clinicos</option>
          <option value="Eventos">Eventos</option>
          <option value="Seguimiento escolarizado">Seguimiento escolarizado</option>
          <option value="Paquetes de materiales">Paquetes de materiales</option>
          <option value="Sesiones">Sesiones</option>
          <option value="Estudios e investigación">Estudios e investigación</option>
          <option value="Alojamiento">Alojamiento</option>
          <option value="Huertos familiares">Huertos familiares</option>
          <option value="Servicios veterinarios">Servicios veterinarios</option>
        </select>
        <br>
        <br>

        <input type="text" class="form-control" id="segundaMeta" name="segundaMeta"
          placeholder="Describa la meta número 2"
          value="<?php if(!$enviado && isset($segundaMeta)) echo $segundaMeta ?>">

        <label class="form-control">Tipo de producto o servicio 2:</label>
        <br>
        <select class="form-control" name="tipoProductoDos"
          value="<?php if(!$enviado && isset($tipoProductoDos)) echo $tipoProductoDos ?>">
          <option value="Alimentación">Alimentación</option>
          <option value="Apoyos">Apoyos</option>
          <option value="Asesoria grupal">Asesoria grupal</option>
          <option value="Capacitación">Capacitación</option>
          <option value="Consultas medicas">Consultas medicas</option>
          <option value="Estudios y analisis clinicos">Estudios y analisis clinicos</option>
          <option value="Eventos">Eventos</option>
          <option value="Seguimiento escolarizado">Seguimiento escolarizado</option>
          <option value="Paquetes de materiales">Paquetes de materiales</option>
          <option value="Sesiones">Sesiones</option>
          <option value="Estudios e investigación">Estudios e investigación</option>
          <option value="Alojamiento">Alojamiento</option>
          <option value="Huertos familiares">Huertos familiares</option>
          <option value="Servicios veterinarios">Servicios veterinarios</option>
        </select>
        <br>
        <br>

        <input type="text" class="form-control" id="terceraMeta" name="terceraMeta"
          placeholder="Describa la meta número 3"
          value="<?php if(!$enviado && isset($terceraMeta)) echo $terceraMeta ?>">

        <label class="form-control">Tipo de producto o servicio 3:</label>
        <br>
        <select class="form-control" name="tipoProductoDos"
          value="<?php if(!$enviado && isset($tipoProductoTres)) echo $tipoProductoTres ?>">
          <option value="Alimentación">Alimentación</option>
          <option value="Apoyos">Apoyos</option>
          <option value="Asesoria grupal">Asesoria grupal</option>
          <option value="Capacitación">Capacitación</option>
          <option value="Consultas medicas">Consultas medicas</option>
          <option value="Estudios y analisis clinicos">Estudios y analisis clinicos</option>
          <option value="Eventos">Eventos</option>
          <option value="Seguimiento escolarizado">Seguimiento escolarizado</option>
          <option value="Paquetes de materiales">Paquetes de materiales</option>
          <option value="Sesiones">Sesiones</option>
          <option value="Estudios e investigación">Estudios e investigación</option>
          <option value="Alojamiento">Alojamiento</option>
          <option value="Huertos familiares">Huertos familiares</option>
          <option value="Servicios veterinarios">Servicios veterinarios</option>
        </select>
        <br>
        <br>

        <!-- Aquí va el script de PHP para determinar que opciones están seleccionadas y solo mostrar los indicadores pertinentes. -->

        <?php if (!empty($errores)): ?>
          <div class="alert error">
            <?php echo $errores; ?>
          </div>
        <?php elseif($enviado): ?>
          <div class="alert success">
            <p>Enviado correctamente</p>
          </div>
        <?php endif ?>

        <input type="submit" name="submit" class="btn btn-primary" value="Enviar correo">
      </form>
    </div>
  </body>
</html>
