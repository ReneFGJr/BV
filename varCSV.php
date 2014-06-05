<?php
require("db.php");
require($include.'sisdoc_debug.php');
require("db_variaveis.php");
require('_class/_class_banco_variaveis.php');
$bc = new banco_variavel;
	
$ele = $_GET['varid'];

$ele = troca($ele,"'",'´');

if (strlen($ele) > 0)
	{
		echo $bc->exportar_lista($ele);
	} else {
		echo 'Variavel não informada';
		echo '<BR>';
		echo $bc->lista_variaveis();
	}
?>