<?php
require ("cab.php");
require ($include . 'sisdoc_debug.php');
require ("_class/_class_cnpq_editais.php");
$cnpq = new cnpq_editais;

require ("_class/_class_cnpq_editais_areas.php");
$cnpqa = new cnpq_editais_areas;

require ("_class/_class_instituicoes.php");
$inst = new instituicao;

require ("_class/_class_pesquisador.php");
$pesq = new pesquisador;

require ($include . '_class_io.php');
$io = new io;

$dir = $io -> le_diretorio('xml/cnpq_edital/', '.xml');

if (count($dir) > 0) {
	$file = trim($dir[0][0]);
	echo '<HR>'.$file;
	if (file_exists($file)) 
		{ echo ' <font color="green">File exists</font>'; }
	echo '<HR>';
	$xml = simplexml_load_file($file);

	$xxx = $xml -> result;
	$xxx = $xxx -> doc;
	$ed = '';
	$eda = '';
	$in = '';
	$au = '';
	$cod_ed = '';
	foreach ($xxx as $row) {

		$line = $row -> str;
		$x1 = trim($line[0]);
		$x2 = troca(utf8_decode(trim($line[1])), "'", "´");
		$x3 = troca(utf8_decode(trim($line[2])), "'", "´");
		$x4 = troca(utf8_decode(trim($line[3])), "'", "´");
		$x5 = troca(utf8_decode(trim($line[4])), "'", "´");

		$autor = $x3;
		echo '<BR>' . $autor;

		if ($eda != $x2) {
			$eda = $x2;
			$cod_eda = $cnpqa -> edital($eda);
		}

		if ($ed != $x4) {
			$ed = $x4;
			$cod_ed = $cnpq -> edital($ed);
		}
		if ($in != $x5) {
			echo '<BR>' . $x5;
			$in = $x5;
			$cod_in = $inst -> instituicao($x5);
		}

		/* Codigo do autor */
		$cod_aut = $pesq -> pesquisador($x3, $cod_in);

		if ((strlen($cod_in) > 0) and (strlen($cod_ed) > 0) and (strlen($cod_eda) > 0) and (strlen($cod_aut) > 0)) {
			/* Lanca */
			$cnpq -> insere_autor_edital($cod_aut, $cod_ed, $cod_eda, $cod_in);
		} else {
			echo '<BR>OPS!';
		}

	}
	$file_n = troca($file,'.xml','.xlm');
	rename($file,$file_n);
	echo '<meta http-equiv="refresh" content="1">';
}

echo '<BR><font color="green">Successfully Inserted</font>';
?>
</body>
</html>
