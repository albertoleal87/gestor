<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="formato.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gestor</title>
<body>

<div id="encabezado">
<h1> Gestor de examenes chido </h1>
</div> <!--Cierra encabezado -->


<div id="menu">
<script src="jquery-1.7.2.min.js" type="text/javascript"></script>
<ul>
<li><input type="button" value="Encabezado" onclick='$("#div1").toggle(200);'></li>
<li><input type="button" value="Relacionar columnas" onclick='$("#div2").toggle(200);'></li>
<li><input type="button" value="Opcion multiple" onclick='$("#div3").toggle(200);'></li>
<li><input type="button" value="Preguntas abiertas" onclick='$("#div4").toggle(200);'></li>
</ul>
</div> <!--Cierra menu -->

<div id="cuerpo"> 

<div id="div1" style="background-color:#eeeeee;border:1px solid; " >
<h1>UNIVERSIDAD AUTONOMA DE NUEVO LEON<h2>
<h2>FACULTAD DE INGENIERIA MECANICA Y ELECTRICA</h2>
<BR>
<table>
<P style="text-align:right">Fecha:____|____|_______</P>
</table>
<?php

@$materia = $_POST['materia'];
@$tema = $_POST['tema'];

echo<<<FORMULARIO
<form action="" method="post">
<table>
<tr>	
<td>Materia:</td><td><input type="text" name="materia" value="$materia" /></td>
</tr>
<BR>
<tr>
<td>Tema:</td><td><input type="text" name="tema" value="$tema" /></td>
</tr>
</table>
<table>
<tr>
<td>Alumno:</td>
<td>___________________________________________________</td>
<td>Matricula:_________________________</td>
</tr>
<tr>

</tr>

<tr>
<td>Maestro:</td>
<td>___________________________________________________</td>
<td>Grupo:___________________________</td>
<BR>
</tr>
<BR>
</table>
<BR>
</form>
FORMULARIO;

?>

</div> <!--cierra div 1--> 

<div id="div2" style="background-color:#eeeeee;border:1px solid; " >
Relacionar columnas

<?php
include("relacionardiv2.php");
?>

</div> <!--cierra div 2-->

<div id="div3" style="background-color:#eeeeee;border:1px solid; ">
Opcion multiple


<?php
include("opcionmultiplediv3.php");
?>

</div> <!--cierra div 3-->
<div id="div4" style="background-color:#eeeeee;border:1px solid; ">
Preguntas abiertas

<?php
include("abiertasdiv4.php");
?>


</div> <!--cierra div 4-->

<div id="div5" style="background-color:#eeeeee;border:1px solid; ">
<input type="submit" />
</div> <!--cierra div 5-->


</div> <!--- Cierra cuerpo--->


</body>

</html>
