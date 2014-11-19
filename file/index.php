<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title></title>
	</head>
	<body>
		<?php
		
require("_class/_class_cnpq_editais.php");
$cnpq = new cnpq_editais;

		$filepath = realpath(dirname(__FILE__));
		include_once ($filepath . "/class.Connection.php");
		$xml = simplexml_load_file("test.xml");

		$con = new Connection();
		$con -> open();
		
		$xxx = $xml->result;
		$xxx = $xxx->doc;
		$ed = '';
		$cod_ed = '';
		foreach ($xxx as $row) {
			
			echo '<HR>';
			$line = $row->str;
			print_r($line);
			$x1 = $line[0];
			$x2 = $line[1];
			$x3 = $line[2];
			$x4 = $line[3];
			$x5 = $line[4];
			
			if ($edital != $x4)
				{
					$edital = $x4;
					$cod_ed = $cnpq->edital($edital);		
				}
		}
		

		$con -> close();
		echo 'Successfully Inserted';
		
		
?>
	</body>
</html>
