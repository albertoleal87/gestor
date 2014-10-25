
<?php

if (isset($_POST['totreactivosop']) && !empty($_POST['totreactivosop']) && ($_POST['totreactivosop']) <= 100 && isset($_POST['totrespuestasop']) && !empty($_POST['totrespuestasop']) && ($_POST['totrespuestasop']) <= 5) 
// si esta el post , si no esta vacio y si es menos o igual a 100

{ // se abre if

echo <<<FORMULARIO
<b>Opcion multiple:Capture las preguntas con su respectiva respuesta en la opcion "a"</b>
<br>
FORMULARIO;

	
$totreactivosop = ($_POST['totreactivosop']);
$totrespuestasop = ($_POST['totrespuestasop']);

$reactivoop = 1;
$respuestaop = 1;

while ($reactivoop <= $totreactivosop) 
{
echo <<<FORMULARIO
<br>
$reactivoop.-
<input type="text" name="reactivoop$reactivoop" value="reactivoop$reactivoop" size="115">
<br>
FORMULARIO;

while ($respuestaop <= $totrespuestasop) 
{

$reactivorespuesta = "reactivo".$reactivoop."respuesta".$respuestaop;
$size = 105/$totrespuestasop;

switch ($respuestaop) {
    case "1":
echo " <a id='red'> a) ";
      break; 
    case "2":
echo " b) ";
      break;
  case "3":
echo " c) ";
      break;
  case "4":
echo " d) ";
      break;
  case "5":
echo " e) ";
      break;}

echo <<<FORMULARIO
<input type= "text" name="$reactivorespuesta" value="$reactivorespuesta" size="$size"></a> 
FORMULARIO;
$respuestaop++;
} //cierra while

echo <<<FORMULARIO
<br>
FORMULARIO;

$respuestaop = 1;
$reactivoop++;
} //cierra while
} //cierra if


// ##########################################################################################################################

if 
(isset($_POST['reactivoop1']) && !empty($_POST['reactivoop1']) 
&& isset($_POST['reactivo1respuesta1']) && !empty($_POST['reactivo1respuesta1'])) 
{	
$idexamen = $_POST['idexamen'];

if (isset($idexamen) && (!empty($idexamen))){

$dp = mysql_connect("localhost", "root", "") or die ("No se logro conectar al servidor");
mysql_select_db("gestor", $dp) or die ("No se logro conectar a la base de datos");
$select = "SELECT * FROM `encabezado` WHERE idexamen='$idexamen' ";
$mysqlquery = mysql_query($select)   ;
$row = mysql_fetch_assoc($mysqlquery);

$totreactivosop = $row['totreactivosop']; 
$totrespuestasop  = $row['totrespuestasop']; 
}

// ############## INSERT


$contador = 1;

while ($contador <= $totreactivosop)
{
@$value1 = $_POST["reactivoop".$contador];
@$value2 = $_POST["reactivo".$contador."respuesta1"];
@$value3 = $_POST["reactivo".$contador."respuesta2"];
@$value4 = $_POST["reactivo".$contador."respuesta3"];
@$value5 = $_POST["reactivo".$contador."respuesta4"];
@$value6 = $_POST["reactivo".$contador."respuesta5"];
	
$insert2 = "INSERT INTO `gestor`.`opcion` (
`id` , `pregunta` , `respuesta1` , `respuesta2` , `respuesta3` ,`respuesta4` ,`respuesta5` , `idexamen` )
VALUES ('$contador' , '$value1' , '$value2' , '$value3', '$value4', '$value5', '$value6' , '$idexamen') " ;


if (mysql_query($insert2)){echo "error con insert";}
$contador++;
}

// ########################## TERMINA INSERT
$reactivoop = 1;
$respuestaop = 1;

$select2 = "SELECT * FROM `opcion` WHERE idexamen='$idexamen' ORDER BY rand(" .time()."*".time().") ";
$mysqlquery2 = mysql_query($select2) or die ("problema con query") ;


echo <<<FORMULARIO
<b>Instrucciones: Subrraye la respuestas correcta.</b>
<br>
FORMULARIO;



include("arrayabc.php");

while ($row2 = mysql_fetch_assoc($mysqlquery2)) 
{	


echo <<<FORMULARIO

<br>
$reactivoop.-

$row2[pregunta]
FORMULARIO;

echo <<<FORMULARIO
<br>	 
FORMULARIO;


while($reactivoop <= $totrespuestasop){

$respuesta = "respuesta".$reactivoop ;
$resp = $row2[$respuesta];

echo "$num[$respuestaop] $resp &nbsp; &nbsp; ";
$respuestaop++;
$reactivoop++;
}

$respuestaop = 1;
$reactivoop = 1;

echo <<<FORMULARIO
<br>
FORMULARIO;
} //cierra while
} //cierra if
?>