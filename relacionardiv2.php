

<?php

if (isset($_POST['reactivos']) && !empty($_POST['reactivos']) && ($_POST['reactivos']) <= 100
&& isset($_POST['respuestas']) && !empty($_POST['respuestas']) && ($_POST['respuestas']) <= 100
) 
// si esta el post , si no esta vacio y si es menos o igual a 100

{
$reactivos = ($_POST['reactivos']);
$respuestas = ($_POST['respuestas']);

$reactivo = 1;
$respuesta = 1;

echo <<<FORMULARIO
<b>Relacionar columnas:Capture las preguntas con su respectiva respuesta del lado derecho</b>

<div id="relacionarcol">
<table>
<br>
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
FORMULARIO;

} //cierra if

// ###########################################################################################################################

if 
(isset($_POST['reactivo1']) && !empty($_POST['reactivo1']) && isset($_POST['respuesta1']) && !empty($_POST['respuesta1']))
{
$idexamen = $_POST['idexamen'];

if (isset($idexamen) && (!empty($idexamen))){

$dp = mysql_connect("localhost", "root", "") or die ("No se logro conectar al servidor");
mysql_select_db("gestor", $dp) or die ("No se logro conectar a la base de datos");
$select = "SELECT * FROM `encabezado` WHERE idexamen='$idexamen' ";
$mysqlquery = mysql_query($select)   ;
$row = mysql_fetch_assoc($mysqlquery);

$reactivos = $row['reactivos']; 
$respuestas  = $row['respuestas']; 

if ($reactivos > $respuestas){$numeromayor = $reactivos;}
else {$numeromayor = $respuestas;}

$counter = 1;

while ($counter <= $numeromayor) 
{
@$value1 = $_POST["reactivo".$counter];
@$value2 = $_POST["respuesta".$counter];

$insert = "INSERT INTO `gestor`.`relacionar` (
`id` , `pregunta` , `respuesta` , `idexamen` )
VALUES ('$counter', '$value1', '$value2', '$idexamen') " ;

if (mysql_query($insert)){}

$counter++;

} // se cierra while 2

//  

$select2 = "SELECT * FROM `relacionar` WHERE idexamen='$idexamen'";
$mysqlquery2 = mysql_query($select2) or die ("problema con query") ;

$select3 = "SELECT * FROM `relacionar` WHERE idexamen='$idexamen' ORDER BY rand(" .time()."*".time().")";
$mysqlquery3 = mysql_query($select3) or die ("problema con query") ;

}

$reactivo = 1;
$respuesta = 1;

echo <<<FORMULARIO
<b>Instrucciones: Relacione las respuestas correctamente.</b>

<div id="relacionarcol2">
<table>
<br>
<table id="relacionarcol2" align="left"><!--abre tabla 1-->
FORMULARIO;

while ($row2 = mysql_fetch_assoc($mysqlquery2)) 
{	
echo <<<FORMULARIO
<tr>
<td>
FORMULARIO;
if($row2['pregunta']){echo"$reactivo.";}
echo <<<FORMULARIO
</td>
<td>$row2[pregunta]</td>



</tr>
FORMULARIO;

$reactivo++;
} //cierra while

echo <<<FORMULARIO

</table> <!--cierra tabla 1-->

<table id="relacionarcol2" align="right"> <!--abre tabla 2-->
 
FORMULARIO;


while ($row3 = mysql_fetch_assoc($mysqlquery3)) 
{
echo <<<FORMULARIO
<tr>
<td>(&nbsp;&nbsp;</td>
<td id="nodisplay">$row3[id]</td>
<td>&nbsp;)</td>
<td>$row3[respuesta]</td></tr>
FORMULARIO;

$respuesta++;
} //cierra while

echo <<<FORMULARIO

</table> <!--cierra tabla 2-->
</table>
</div>
<br>
FORMULARIO;
}
 




?>