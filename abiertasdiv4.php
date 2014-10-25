

<?php

if (isset($_POST['totreactivosab']) && !empty($_POST['totreactivosab']) && ($_POST['totreactivosab']) <= 100) 
// si esta el post , si no esta vacio y si es menos o igual a 100

{ // se abre if

echo <<<FORMULARIO
<b>Preguntas abiertas: Capture las preguntas con su respectiva respuesta</b>
<br>
<br>
FORMULARIO;

$totreactivosab = ($_POST['totreactivosab']);

$reactivoab = 1;

while ($reactivoab <= $totreactivosab) 
{
echo <<<FORMULARIO
<table>
<tr>
<td>
$reactivoab.- <input type="text" name="reactivoab$reactivoab" value="reactivoab$reactivoab" size="115">
</td>	
</tr>
<tr>
<td id="red">
R= <input type="text" name="respuestaab$reactivoab" value="respuestaab$reactivoab" size="115">
</td>
</tr>
</table>
<br>
FORMULARIO;
$reactivoab++;
} //CIERRA WHILE
} // CIERRA IF



if(isset($_POST['reactivoab1']) && !empty($_POST['reactivoab1']) && isset($_POST['respuestaab1']) && !empty($_POST['respuestaab1']))
{ 


$dp = mysql_connect("localhost", "root", "") or die ("No se logro conectar al servidor");
mysql_select_db("gestor", $dp) or die ("No se logro conectar a la base de datos");
$select = " SELECT * FROM `encabezado` WHERE idexamen='$idexamen' ";
$mysqlquery = mysql_query($select)   ;
$row = mysql_fetch_assoc($mysqlquery);

$totreactivosab = $row['totreactivosab'];

echo <<<FORMULARIO
<b>Preguntas abiertas: conteste las preguntas correctamente.</b>
<br>
<br>
FORMULARIO;

$reactivoab = 1;

while ($reactivoab <= $totreactivosab) 
{
$post1 = $_POST["reactivoab".$reactivoab];
$post2 = $_POST["respuestaab".$reactivoab];

echo <<<FORMULARIO
<table>
<tr>

$reactivoab.- $post1
	
</tr>
<tr>
<td>R= </td>
<td id="nodisplay">
$post2
</td>
</tr>
</table>
<br>
FORMULARIO;
$reactivoab++;
} //CIERRA WHILE

} 
?>