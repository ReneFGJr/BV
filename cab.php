<?php
require("db.php");
require("_class/_class_header.php");
$hd = new header;
require("_class/_class_message.php");
require($include.'sisdoc_debug.php');

$html = '<div id="home">
	<A href="index.php" class="link_cab">
	<img src="img/icone_home_white.png" height="20"> HOME</A>
	&nbsp;;
	<A href="indicador.php" class="link_cab">
	<img src="img/icone_pie_white.png" height="20"> INDICADORES</A>
	</div>';
$hd->cab_content = $html;

echo $hd->head();
echo $hd->cab();

require($include.'sisdoc_menus.php');


?>

