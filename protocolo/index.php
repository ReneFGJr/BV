<?php
require("cab.php");
require("../_class/_class_protocolo.php");
$proto = new protocolo;

echo '<H1>Solicita��o de Servi�os</h1>';
echo $proto->show_action($dd[1]);

?>