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
<BR>
<h2>FACULTAD DE INGENIERIA MECANICA Y ELECTRICA</h2>
<BR>
<table>
<P style="text-align:right">Fecha:____|____|_______</P>
</table>
<?php

@$materia = $_POST['materia'];
@$tema = $_POST['tema'];

echo<<<FORMULARIO
<form action="$_SERVER[PHP_SELF]" method="post">
<table>
<BR>
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
FORMULARIO;
?>
</div> <!--cierra div 1--> 
<div id="div2" style="background-color:#eeeeee;border:1px solid; " >
Relacionar columnas

<?php
if (isset($_POST['reactivos']) && !empty($_POST['reactivos']) && ($_POST['reactivos']) <= 100)
{}
else

echo <<<FORMULARIO

<table>
<form action="$_SERVER[PHP_SELF]" method="post">
<tr><td>Ingrese numero de Reactivos:</td><td><input type="text" name="reactivos" /></td></tr>
<br>
<tr><td>Ingrese numero de Respuestas:</td><td><input type="text" name="respuestas" /></td></tr>
</table>
<br>


<input type="submit" name="creaseccion" value="Agrega seccion" />
FORMULARIO;


if (isset($_POST['reactivos']) && empty($_POST['reactivos'])) 
// si el post esta vacio
{echo "<script type='text/javascript'> 'javascript:history.back()' </script> <font color='#FF0000'><br>Debe ingresar numero de reactivos.</font>";}

if (isset($_POST['reactivos']) && (($_POST['reactivos']) > 100)) 
// si el post es mayor a 100
{echo "<script type='text/javascript'> 'javascript:history.back()' </script> <font color='#FF0000'><br>Este apartado solo acepta maximo 100 reactivos.</font>";}

if (isset($_POST['reactivos']) && !empty($_POST['reactivos']) && ($_POST['reactivos']) <= 100) 
// si esta el post , si no esta vacio y si es menos o igual a 100

{

$reactivos = ($_POST['reactivos']);
$respuestas = ($_POST['respuestas']);

$fp = fopen("reactivos.txt", "r+");
rewind($fp );
fputs($fp, "   ");
rewind($fp );
fputs($fp, $reactivos);
fclose($fp);

$fp = fopen("respuestas.txt", "r+");
rewind($fp );
fputs($fp, "   ");
rewind($fp );
fputs($fp, $respuestas);
fclose($fp);

$reactivo = 1;
$respuesta = 1;

echo <<<FORMULARIO
<form action="$_SERVER[PHP_SELF]" method="post">
<font color='#FF0000'>Ingrese un nombre de Tema y Materia con el cual se relacionaran los reactivos:</font>
<br>
<br>
Tema:<input type="text" name="tema"/>
<br>
<br>
Materia:<input type="text" name="materia" />
<br>
<br>
<font color='#FF0000'>Favor de ingresar reactivos con su respectiva respuesta:</font>
<br>
<br>
<div id="relacionar">
<table>
<table align="left">
FORMULARIO;

while ($reactivo <= $reactivos) 
{
echo <<<FORMULARIO
<tr>
<td>$reactivo</td>
<td><input type="text" name="reactivo$reactivo" value="reactivo$reactivo"></td>
</tr>
FORMULARIO;
$reactivo++;
} //cierra while

echo <<<FORMULARIO
</table>
<table align="right">
FORMULARIO;


while ($respuesta <= $respuestas) 
{
echo <<<FORMULARIO
<tr>
<td>$respuesta</td>
<td><input type="text" name="respuesta$respuesta" value="respuesta$respuesta"></td>
</tr>
FORMULARIO;
$respuesta++;
} //cierra while

echo <<<FORMULARIO
</table>
</table>
</div>
<br>
<input type="submit" name="guardar" value="Guarda Reactivos" />
FORMULARIO;

} //cierra if

if (isset($_POST['tema']) && !empty ($_POST['tema']) && isset($_POST['materia']) && !empty ($_POST['materia'])) 
{
$counter = 1;
$tema = $_POST['tema'];
$materia = $_POST['materia'];

$dp = mysql_connect("localhost", "root", "") or die ("No se logro conectar al servidor");
mysql_select_db("gestor", $dp) or die ("No se logro conectar a la base de datos");

$f1 = fopen("reactivos.txt", "r+");
$numero1 = fgets($f1, 7);
fclose($f1);

$f2 = fopen("respuestas.txt", "r+");
$numero2 = fgets($f2, 7);
fclose($f2);

if ($numero1 > $numero1){$numeromayor = $numero1;}
else {$numeromayor = $numero2;}

while ($counter <= $numeromayor) 
{ //inicia while 2
@$value1 = $_POST["reactivo".$counter];
@$value2 = $_POST["respuesta".$counter];

echo "Reactivo $counter: $value1<br>";
echo "Respuesta $counter: $value2<br>";

$insert = "INSERT INTO `gestor`.`relacionar` (
`reactivo` , `respuesta` , `tema` , `materia`)
VALUES ('$value1', '$value2', '$tema', '$materia' ) " ;

if (mysql_query($insert)){echo "<font color='#0000FF'><b>Ingresado con exito</b></font><br><br>";}
else {echo "Problema con query";}

$counter++;

} // se cierra while 2



} // se cierra if
else {echo "ingresa datos"; }


?>
</div> <!--cierra div 2-->
<div id="div3" style="background-color:#eeeeee;border:1px solid; ">
Opcion multiple
</div> <!--cierra div 3-->
<div id="div4" style="background-color:#eeeeee;border:1px solid; ">
Preguntas abiertas
</div> <!--cierra div 4-->



</div> <!--- Cierra cuerpo--->


</body>

</html>
