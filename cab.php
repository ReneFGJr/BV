<?php
require("db.php");
require("_class/_class_header.php");
$hd = new header;

echo $hd->head();
echo $hd->cab();

require($include.'sisdoc_menus.php');


?>

