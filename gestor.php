<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="formato.css" type="text/css" rel="stylesheet" />



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
$fp = fopen("idexamen.txt", "r+") ;
$idexamen = fgets($fp, 7) ;
$idexamen++;
rewind($fp);
fputs($fp, "$idexamen");
fclose($fp);
?>

<title>Gestor</title>



<body>

<div id="logo2"  >


</div> <!--Cierra encabezado -->


<div id="encabezado" style="background-color:#eeeeee;border:1px solid; ">
<h1> Gestor de examenes </h1> 

</div> <!--Cierra encabezado -->

<div id="menu" style="background-color:#eeeeee;border:1px solid; ">
<script src="jquery-1.7.2.min.js" type="text/javascript"></script>
<ul>
<li><input type="button" value="Nuevo Examen" onclick='$("#botones , #div5, #menu").toggle(200);' ></li>
<li><input type="button" value="Imprimir Examen"></li>
</ul>
</div> <!--Cierra menu -->

<div id="cuerpo"> 

<div id="botones" style="background-color:#eeeeee;border:1px solid; display:none ">
<script src="jquery-1.7.2.min.js" type="text/javascript"></script>
<form action="gestor2.php" method="post">
<ul>
<li><input type="button" value="Encabezado" onclick='$("#div1").toggle(200);' ></li>
<li><input type="button" value="Relacionar columnas" onclick='$("#div2").toggle(200);'></li>
<li><input type="button" value="Opcion multiple" onclick='$("#div3").toggle(200);'></li>
<li><input type="button" value="Preguntas abiertas" onclick='$("#div4").toggle(200);'></li>

<?php
echo "<li>ID EXAMEN:<input type='text' name='idexamen' value='$idexamen' readonly='readonly'/>";
?>

</li>
</ul>
</div> <!--Cierra botones -->

<div id="cuerpo"> 

<div id="div1" style="background-color:#eeeeee;border:1px solid; display:none" >

<?php
include("encabezado.php");
?>

</div> <!--cierra div 1--> 

<div id="div2" style="background-color:#eeeeee;border:1px solid; display:none" >
<b>Relacionar columnas:</b>
<br>
Capture numero de Reactivos:<input type="text" name="reactivos" />
<br>
<br>
Capture numero de Respuestas:<input type="text" name="respuestas" />
<br>
<br>

</div> <!--cierra div 2-->

<div id="div3" style="background-color:#eeeeee;border:1px solid; display:none ">

<br>
Capture numero de reactivos:<input type="text" name="totreactivosop" />
<br>
<br>
Capture numero de respuestas por reactivo:
<select name="totrespuestasop">
<option></option>
<option>5</option>
<option>4</option>
<option>3</option>
<option>2</option>
</select>
<br>
<br>
</div> <!--cierra div 3-->

<div id="div4" style="background-color:#eeeeee;border:1px solid; display:none ">

<b>Preguntas abiertas:</b>
<br>
Numero de Reactivos:<input type="text" name="totreactivosab"/>
<br>
<br>

</div> <!--cierra div 4-->

<div id="div5" style="background-color:#eeeeee;border:1px solid; display:none ">
<input type="submit" value="Crear formularios" />	
<a href="gestor.php">
<input type="button" value="Regresar"/>
</a>
</form>
</div> <!--cierra div 5-->



</div> <!--- Cierra cuerpo--->


</body>

</html>
