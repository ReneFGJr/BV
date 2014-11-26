<?php
require("db.php");
require ("_class/_class_cnpq_editais.php");
$cnpq = new cnpq_editais;

$inst = $dd[1];

		$sql = "select * from
					(
					select * from icip_editais_autores
					inner join icip_editais on ied_codigo = iea_edital
					where iea_instituicao = '$inst' and 
					(ied_ano = '2012' or ied_ano = '2013')
					) as tabela
					inner join pesquisador on iea_autor = pe_codigo 					
					order by pe_nome, ied_descricao
			";
					
		$rlt = db_query($sql);
		$sx .= '<table width="100%">';
		$sx .= '<TR><TH>Pesquisador</TH><TH>Edital';
		while ($line = db_read($rlt))
			{
				$sx .= '<TR>';
				$sx .= '<TD>';
				$sx .= $line['pe_nome'];
				$sx .= '<TD>';
				$sx .= $line['ied_descricao'];
			}
		$sx .= '</Table>';
		echo $sx;
?>
