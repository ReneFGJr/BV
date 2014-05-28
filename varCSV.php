<?php
require("db.php");
require("db_variavel.php");
require('../_class/_class_banco_variaveis.php');
$bc = new banco_variavel;

$ele = $get['varid'];
$ele = troca($ele,"'",'´');

if (strlen($ele) > 0)
	{
		$bc->exportar_lista($ele);
	} else {
		echo 'Variavel não informada';
	}
?>