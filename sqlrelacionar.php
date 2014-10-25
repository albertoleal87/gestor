<?php

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
