<?php
require("cab.php");

echo $hd->hr('Indicador de captação');

$menu = array();
array_push($menu,array('Captação','CNPq','indicador_captacao_cnpq.php'));
echo menus($menu,3);

//require("foot.php");
?>
