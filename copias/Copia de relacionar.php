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
<form action="" method="post">
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

$reactivo = 1;
$respuesta = 1;

echo <<<FORMULARIO
<table>
<table align="left"><!--abre tabla 1-->
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

</table> <!--cierra tabla 1-->

<table align="right"> <!--abre tabla 2-->

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

</table> <!--cierra tabla 2-->
</table>
<br>

FORMULARIO;

} //cierra if

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
