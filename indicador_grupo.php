<?php
require("cab.php");

echo $hd->hr('Grupos de Pesquisa');

$menu = array();
array_push($menu,array('Grupos de Pesquisa','Grupos no CNPq','indicador_grupos_cnpq.php'));
array_push($menu,array('Grupos de Pesquisa (importar)','Grupos no CNPq','inport_dgp.php'));
echo menus($menu,3);

//require("foot.php");
?>
