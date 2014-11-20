<?php
require("cab.php");
require($include.'_class_io.php');
$io = new io;

echo '<H1>Inporta arquivo de professores</h1>';
$txt = $io->loadfile('xml/pucpr/professor_2014_out_2.csv');

require("_class/_class_docentes_rh.php");
$rh = new docentesRH;

$rh->inport_file($txt);

require("foot.php");
?>
