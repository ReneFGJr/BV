<?php
class banco_variavel
	{
	var $tabela = 'variaveis';
	var $tabela_dados = 'dados';
	
	function exportar_lista($var)
		{
			$codigo = $this->recupera_codigo($var);
			$sql = "select * from ".$this->tabela_dados." 
						inner join ".$this->tabela." on d_variavel = v_codigo
						
					where v_codigo = '$codigo' 
					order by d_fld1, d_fld2
					";
			echo $sql;
		}
	
	function alimenta_lista($var,$vals=array())
		{
			$cod = $this->recupera_codigo($var);
			if (strlen($cod) > 0)
				{
					for($r=0;$r < count($vals);$r++)
						{
							$vars = $vals[$r];
							$this->grava_registro($cod,$vars);
						}
					return(1);
				} else {
					return(0);
				}
			
		}
		
	function grava_registro($codigo,$vars)
		{
			$fld1 = $vars[0];
			$fld2 = $vars[1];
			$fld3 = $vars[2];
			$fld4 = abs($vars[3]);
			$fld5 = abs($vars[4]);
			$fld6 = abs($vars[5]);
			
			$sql = "select * from ".$this->tabela_dados." 
					where d_variavel = '$codigo' 
							and d_fld1 = '$fld1'
							and d_fld2 = '$fld2' ";
			$rlt = db_query($sql);
			
			if ($line = db_read($rlt))							
				{
					if ($line['d_lock'] != '1')
						{
						$sql = "update ".$this->tabela_dados." set 
								d_fld3 = '$fld3',
								d_fld4 = '$fld4',
								d_fld5 = '$fld5',
								d_fld6 = '$fld6'
							where id_d = ".$line['id_d'];
						}
				} else {
					$sql = "insert into ".$this->tabela_dados."
							(
								d_variavel, 
								d_fld1, d_fld2, d_fld3,
								d_fld4, d_fld5, d_fld6,
								d_lock
							) values (
								'$codigo',
								'$fld1','$fld2','$fld3',
								'$fld4','$fld5','$fld6',
								0
							)
							";
				}
				$xrlt = db_query($sql);

		}
	
	function recupera_codigo($var)
		{
			$sql = "select * from ".$this->tabela." where v_variavel = '".$var."'";
			$rlt = db_query($sql);
			if ($line = db_read($rlt))
				{
					return($line['v_codigo']);
				} else {
					return('');
				}
		}
	function lista_variaveis()
		{
			$sql = "select * from ".$this->tabela." 
						where v_ativo = 1
					order by v_variavel
			";
			$rlt = db_query($sql);
			
			while ($line = db_read($rlt))
				{
					$sx = $this->mostra_variavel($line);
				}
		}	
	function mostra_variavel($line)
		{
			$sx = '<TR>';
			$sx .= '<TD>';
			$sx .= trim($line['v_nome']);
			$sx .= '<TD>';
			$sx .= trim($line['v_codigo']);
			$sx .= '<TD>';
			$sx .= trim($line['v_update']);
			return($sx);			
		}
	}
?>
