	
<?php

$dp = mysql_connect("localhost", "root", "") or die ("No se logro conectar al servidor");
mysql_select_db("gestor", $dp) or die ("No se logro conectar a la base de datos");
$select = " SELECT * FROM `encabezado` WHERE idexamen='$idexamen' ";
$mysqlquery = mysql_query($select)   ;
$row = mysql_fetch_assoc($mysqlquery);

if ($row){ 

$idexamen = $row['idexamen']; 
$tipo = $row['tipo']; 
$materia = $row['materia']; 
$semestre = $row['semestre']; 
$academia = $row['academia']; 

echo <<<FORMULARIO
<div id="logo">
<table>
<tr>
<td>
<img src="logofime.bmp" />
</td>
<td>
<h1>UNIVERSIDAD AUTONOMA DE NUEVO LEON</h1>
<br>
<br>
<h2 style="text-align:left">FACULTAD DE INGENIERIA MECANICA Y ELECTRICA</h2>
<br>
<br>
<b>
TIPO DE EXAMEN: $tipo
</b>
</td>
</tr>
</table>
</div>

<BR>
<b>
Nombre de la materia: $materia
<BR>
<br>
Semestre: $semestre
<br>
<br>
Academia: $academia
</b>
</b>
<br>
FORMULARIO;
}

else {

echo <<<FORMULARIO
<div id="logo">
<table>
<tr>
<td>
<img src="logofime.bmp" />
</td>
<td>
<h1>UNIVERSIDAD AUTONOMA DE NUEVO LEON</h1>
<br>
<br>
<h2 style="text-align:left">FACULTAD DE INGENIERIA MECANICA Y ELECTRICA</h2>
<br>
<br>


<b>
TIPO DE EXAMEN:<input type="text" name="tipo" value="Ordinario"/>
</b>
</td>
</tr>
</table>
</div>

<BR>

Nombre de la materia:<input type="text" name="materia" value="Seminario de sistemas"/>
<BR>
<br>
Semestre:<input type="text" name="semestre" value="9°"/>
<br>
<br>
Academia:<input type="text" name="academia" value="Software de base"/>
<br>
FORMULARIO;

}

?>
