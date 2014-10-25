<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="formato.css" type="text/css" rel="stylesheet" />
<link href="versionimprimir.css" rel="stylesheet" type="text/css" media="print" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.</title>
<body>
<div id="logo2"  >


</div>
<div id="encabezado" style="background-color:#eeeeee;">

<h1> Gestor de examenes </h1>

<form action="gestor3.php" method="post">

<?php	

if (
isset($_POST['reactivo1']) && !empty($_POST['reactivo1']) && isset($_POST['respuesta1']) && !empty($_POST['respuesta1'])

or

isset($_POST['reactivoop1']) && !empty($_POST['reactivoop1']) && isset($_POST['reactivo1respuesta1']) && !empty($_POST['reactivo1respuesta1']) 

or

isset($_POST['reactivoab1']) && !empty($_POST['reactivoab1']) && isset($_POST['respuestaab1']) && !empty($_POST['respuestaab1']) 
) 

{// se abre suer if

$idexamen = $_POST['idexamen'];

if (isset($idexamen) && (!empty($idexamen))){

$dp = mysql_connect("localhost", "root", "") or die ("No se logro conectar al servidor");
mysql_select_db("gestor", $dp) or die ("No se logro conectar a la base de datos");

$select = "SELECT * FROM `encabezado` WHERE idexamen='$idexamen' ";
$mysqlquery = mysql_query($select)   ;
$row = mysql_fetch_assoc($mysqlquery);

echo <<<FORMULARIO
</div> <!--Cierra encabezado -->

<div id="botones" style="background-color:#eeeeee;border:1px solid; display:none" " >
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

<div style="background-color:#eeeeee;" align="right" style="padding-right:10px">
<div id="idexamen" >
ID EXAMEN:$idexamen &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      
</div>
</div> <!--Cierra botones -->


<div id="cuerpo"> 
FORMULARIO;

echo <<<FORMULARIO
<div id="div1" style="background-color:#eeeeee; " >
FORMULARIO;

include("encabezado.php");

echo <<<FORMULARIO
</div> <!--cierra div 1-->
FORMULARIO;


if (isset($_POST['reactivo1']) && !empty($_POST['reactivo1']) && isset($_POST['respuesta1']) && !empty($_POST['respuesta1']) ) 
{
echo <<<FORMULARIO
<div id="div2" style="background-color:#eeeeee; " >
FORMULARIO;

include("arrayabc.php");
include("relacionardiv2.php");


echo <<<FORMULARIO
</div> <!--cierra div 2-->
FORMULARIO;
}

if (isset($_POST['reactivoop1']) && !empty($_POST['reactivoop1']) && isset($_POST['reactivo1respuesta1']) && !empty($_POST['reactivo1respuesta1']) ) 

{
echo <<<FORMULARIO
<div id="div3" style="background-color:#eeeeee; ">
FORMULARIO;

include("opcionmultiplediv3.php");



echo <<<FORMULARIO
</div> <!--cierra div 3-->
FORMULARIO;
} // Cierra if 3


if (isset($_POST['reactivoab1']) && !empty($_POST['reactivoab1']) && isset($_POST['respuestaab1']) && !empty($_POST['respuestaab1']) ) 
{
echo <<<FORMULARIO
<div id="div4" style="background-color:#eeeeee; ">
FORMULARIO;

include("abiertasdiv4.php");

echo <<<FORMULARIO
</div> <!--cierra div 4-->
FORMULARIO;

} // cierra if preguntas abiertas

echo <<<FORMULARIO
<div id="div5" style="background-color:#eeeeee; ">

FORMULARIO;

} // cierra if id examen

echo <<<FORMULARIO
<a href="gestor.php">
<input type="button" value="Regresar"/>
</a>
FORMULARIO;

} // se cierra super if

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