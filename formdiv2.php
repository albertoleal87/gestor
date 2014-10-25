<b>Capture las preguntas con su respectiva respuesta del lado derecho</b>

<?php



if (isset($_POST['reactivos']) && !empty($_POST['reactivos']) && ($_POST['reactivos']) <= 100)
{}
else

echo <<<FORMULARIO

<table>
<form action="$_SERVER[PHP_SELF]" method="post">
<tr><td>Numero de Reactivos:</td><td><input type="text" name="reactivos" value="10"/></td></tr>
<br>
<tr><td>Numero de Respuestas:</td><td><input type="text" name="respuestas" value="10"/></td></tr>
</table>
<br>

FORMULARIO;

if (isset($_POST['reactivos']) && !empty($_POST['reactivos']) && ($_POST['reactivos']) <= 100) 
// si esta el post , si no esta vacio y si es menos o igual a 100

{
$reactivos = ($_POST['reactivos']);
$respuestas = ($_POST['respuestas']);

$reactivo = 1;
$respuesta = 1;

echo <<<FORMULARIO
<div id="relacionarcol">
<table>
<table align="left"><!--abre tabla 1-->
FORMULARIO;

while ($reactivo <= $reactivos) 
{
echo <<<FORMULARIO
<tr>
<td>$reactivo.</td>
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
<td>$num[$respuesta]</td>
<td id="red"><input type="text" name="respuesta$respuesta" value="respuesta$respuesta"></td></tr>

FORMULARIO;
$respuesta++;
} //cierra while

echo <<<FORMULARIO

</table> <!--cierra tabla 2-->
</table>
</div>
<br>
</form>
FORMULARIO;

} //cierra if






?>