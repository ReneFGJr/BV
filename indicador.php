<?php
require("cab.php");

echo $hd->hr('Indicador de captação');
$tab_max = '100%';

$menu = array();
array_push($menu,array('Captação CNPq','CNPq','indicador_captacao.php'));

array_push($menu,array('Grupo de Pesquisa','Grupo de pesquisa','indicador_grupo.php'));
echo menus($menu,3);

//require("foot.php");
?>
