<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="formato.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gestor</title>
<body>
<div id="logo2"  >


</div>
<div id="encabezado" style="background-color:#eeeeee;border:1px solid; ">
<h1> Gestor de examenes </h1>

<form action="gestor3.php" method="post">

<?php

if ( 
isset($_POST['tipo']) && !empty($_POST['tipo']) && 
isset($_POST['materia']) && !empty($_POST['materia']) && 
isset($_POST['semestre']) && !empty($_POST['semestre']) && 
isset($_POST['academia']) && !empty($_POST['academia']) 
or
isset($_POST['reactivos']) && !empty($_POST['reactivos']) && ($_POST['reactivos']) <= 100 
&& isset($_POST['respuestas']) && !empty($_POST['respuestas']) && ($_POST['respuestas']) <= 100
or
isset($_POST['totreactivosop']) && !empty($_POST['totreactivosop']) && ($_POST['totreactivosop']) <= 100 && isset($_POST['totrespuestasop']) && !empty($_POST['totrespuestasop']) && ($_POST['totrespuestasop']) <= 5
or
isset($_POST['totreactivosab']) && !empty($_POST['totreactivosab']) && ($_POST['totreactivosab']) <= 100
)

{ // super if
	
@$tipo = $_POST[tipo];
@$materia = $_POST[materia];
@$semestre = $_POST[semestre];
@$academia = $_POST[academia];
@$idexamen = $_POST[idexamen];
@$reactivos = $_POST[reactivos];
@$respuestas = $_POST[respuestas];
@$totreactivosop = $_POST[totreactivosop];
@$totrespuestasop = $_POST[totrespuestasop];
@$totreactivosab = $_POST[totreactivosab];
	
$dp = mysql_connect("localhost", "root", "") or die ("No se logro conectar al servidor");
mysql_select_db("gestor", $dp) or die ("No se logro conectar a la base de datos");
$insert = "INSERT INTO `gestor`.`encabezado` 
(`tipo`, `materia`, `semestre`, `academia`, `idexamen`, `reactivos`, `respuestas`, `totreactivosop`, `totrespuestasop`, `totreactivosab`) 
VALUES ('$tipo', '$materia', '$semestre', '$academia', '$idexamen', '$reactivos', '$respuestas', '$totreactivosop', '$totrespuestasop', '$totreactivosab');";

if (mysql_query($insert))

{

$select = " SELECT * FROM `encabezado` WHERE idexamen='$idexamen' ";
$mysqlquery = mysql_query($select)   ;
$row = mysql_fetch_assoc($mysqlquery);

$idexamen = $row['idexamen'];

echo <<<FORMULARIO
</div> <!--Cierra encabezado -->

<div id="botones" style="background-color:#eeeeee;border:1px solid;">
<script src="jquery-1.7.2.min.js" type="text/javascript"></script>
<form action="gestor2.php" method="post">
<ul>
<li><input type="button" value="Encabezado" onclick='$("#div1").toggle(200);' ></li>
<li><input type="button" value="Relacionar columnas" onclick='$("#div2").toggle(200);'></li>
<li><input type="button" value="Opcion multiple" onclick='$("#div3").toggle(200);'></li>
<li><input type="button" value="Preguntas abiertas" onclick='$("#div4").toggle(200);'></li>
<li>ID EXAMEN:<input type='text' name='idexamen' value='$idexamen' readonly='readonly'/>
</li>
</ul>
</div> <!--Cierra botones -->

<div id="cuerpo"> 
FORMULARIO;

if (
isset($_POST['tipo']) && !empty($_POST['tipo']) && 
isset($_POST['materia']) && !empty($_POST['materia']) && 
isset($_POST['semestre']) && !empty($_POST['semestre']) && 
isset($_POST['academia']) && !empty($_POST['academia']) 
) 

{
echo <<<FORMULARIO
<div id="div1" style="background-color:#eeeeee;border:1px solid; display:none " >
FORMULARIO;

include("encabezado.php");

echo <<<FORMULARIO
</div> <!--cierra div 1-->
FORMULARIO;
}

if (isset($_POST['reactivos']) && !empty($_POST['reactivos']) && ($_POST['reactivos']) <= 100 && isset($_POST['reactivos']) && !empty($_POST['reactivos']) && ($_POST['reactivos']) <= 100) 

{
echo <<<FORMULARIO
<div id="div2" style="background-color:#eeeeee;border:1px solid; " >
FORMULARIO;

include("arrayabc.php");
include("relacionardiv2.php");


echo <<<FORMULARIO
</div> <!--cierra div 2-->
FORMULARIO;
}

if (isset($_POST['totreactivosop']) && !empty($_POST['totreactivosop']) && ($_POST['totreactivosop']) <= 100 && isset($_POST['totrespuestasop']) && !empty($_POST['totrespuestasop']) && ($_POST['totrespuestasop']) <= 5)

{
echo <<<FORMULARIO
<div id="div3" style="background-color:#eeeeee;border:1px solid; ">
FORMULARIO;

include("opcionmultiplediv3.php");

echo <<<FORMULARIO
</div> <!--cierra div 3-->
FORMULARIO;
} // Cierra if 3


if (isset($_POST['totreactivosab']) && !empty($_POST['totreactivosab']) && ($_POST['totreactivosab']) <= 100) 
{
echo <<<FORMULARIO
<div id="div4" style="background-color:#eeeeee;border:1px solid; ">
FORMULARIO;

include("abiertasdiv4.php");

echo <<<FORMULARIO
</div> <!--cierra div 4-->
FORMULARIO;

} // cierra if preguntas abiertas

echo <<<FORMULARIO
<div id="div5" style="background-color:#eeeeee; border:1px solid; ">
<input type="submit" value="Vista previa" />
<a href="gestor.php">
<input type="button" value="Regresar"/>
</a>
FORMULARIO;

} //cierra insert

else{

echo <<<FORMULARIO

<div id="div5" style="background-color:#eeeeee; border:1px solid; ">
<font size="+1" color='#FF0000'>"Error al cargar los datos"</font>
<a href="gestor.php">
<input type="button" value="Regresar"/>
</a>
FORMULARIO;

}

} // super if

else { //si el super if es falso
echo <<<FORMULARIO

<div id="div5" style="background-color:#eeeeee; border:1px solid; ">
<font size="+1" color='#FF0000'>"Error al cargar los datos"</font>
<a href="gestor.php">
<input type="button" value="Regresar"/>
</a>
FORMULARIO;
} //cierra else super if


?>

</div> <!--cierra div 5-->

</div> <!--- Cierra cuerpo--->
</body>
</html>