<?php
require("cab.php");	
require("_class/_class_cnpq_editais.php");
$cnpq = new cnpq_editais;

require("_class/_class_cnpq_editais_areas.php");
$cnpqa = new cnpq_editais_areas;

require("_class/_class_instituicoes.php");
$inst = new instituicao;

		$xml = simplexml_load_file("test.xml");

	
		$xxx = $xml->result;
		$xxx = $xxx->doc;
		$ed = '';
		$eda = '';
		$in = '';
		$au = '';
		$cod_ed = '';
		foreach ($xxx as $row) {
			
			$line = $row->str;
			$x1 = $line[0];
			$x2 = utf8_decode(trim($line[1]));
			$x3 = utf8_decode(trim($line[2]));
			$x4 = utf8_decode(trim($line[3]));
			$x5 = utf8_decode(trim($line[4]));
			
			$autor = $x3;
			echo '<BR>'.$autor;
			
			if ($eda != $x2)
				{
					$eda = $x2;
					$cod_eda = $cnpqa->edital($eda);	
				}			
			
			if ($ed != $x4)
				{
					$ed = $x4;
					$cod_ed = $cnpq->edital($ed);	
				}
			if ($in != $x5)
				{
					echo '<BR>'.$x5;
					$in = $x5;
					$cod_in = $inst->instituicao($x5);
				}
			
		}
		
		echo '<BR><font color="green">Successfully Inserted</font>';
		
		
?>
	</body>
</html>
