<?php
require("cab.php");

echo $hd->hr('Indicador de capta��o');

$menu = array();
array_push($menu,array('Capta��o','Capta��es Instituicional','indicador_captacao_cnpq.php'));
array_push($menu,array('Capta��o','CNPq','indicador_captacao_cnpq.php'));
echo menus($menu,3);

//require("foot.php");
?>
