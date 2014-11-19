<?php
class cnpq_editais {
	var $tabela = 'icip_editais';
	function edital($id) {
		$sql = "select * from " . $this -> tabela . " where 
					ied_descricao = '$id'
			";
		$rlt = db_query($sql);
		if ($line = db_read($rlt)) {
			return ($line['ied_codigo']);
		} else {
			$xsql = "insert into icip_editais 
						(ied_codigo, ied_descricao, ied_ativo,
						ied_ano)
						values
						('','$id',1,'')
					";
			echo '<hr>' . $sql;
			$rlt = db_query($xsql);
			$this -> updatex();
			$rlt = db_query($sql);
			$line = db_read($rlt);
			return ($line['ied_codigo']);
		}
	}

	function updatex() {
		$c = 'ied';
		$c1 = 'id_' . $c;
		$c2 = $c . '_codigo';
		$c3 = 5;
		$sql = "update " . $this -> tabela . " set $c2 = lpad($c1,$c3,0) where $c2='' ";
		echo $sql;
		$rlt = db_query($sql);
	}

	function structure() {
		$sql = "
			CREATE TABLE icip_editais (
			id_ied serial NOT NULL,
  			ied_codigo char(5) NOT NULL,
  			ied_descricao char(200) NOT NULL,
  			ied_ativo int(11) NOT NULL,
  			ied_ano char(4) NOT NULL
			) ";
		$rlt = db_query($sql);

	}

}
?>
