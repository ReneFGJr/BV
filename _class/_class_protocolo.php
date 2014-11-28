<?php
class protocolo
	{
		function show_action($pai='')
			{
				$sx = '';
				$this->structure();
				if (strlen($pai) > 0)
				{
					$sql = "select * from protocolo_servicos where sv_codigo = '$pai' ";
					$rlt = db_query($sql);
					if ($line = db_read($rlt))
						{
							$sx .= '<h3>'.trim($line['sv_nome']).'</h3>';
						}
				}
				$sql = "select * from protocolo_servicos 
							where sv_pai = '$pai' 
							and sv_ativo=1 
							order by sv_codigo ";
				$rlt = db_query($sql);
				$sx .= '<UL>';
				while($line = db_read($rlt))
					{
						$sx .= $this->mostra_botao($line);
					}
				$sx .= '</UL>';
				return($sx);
			}
		function mostra_botao($line)
			{
				$sx = '';
				$sx .= '<A HREF="'.page().'?dd1='.$line['sv_codigo'].'" border=0>';
				$sx .= '<LI class="botao_protocolo">';
				$sx .= trim($line['sv_nome']);
				$sx .= '</li></A>';
				return($sx);
			}
		function structure()
			{
				return("");
				$sql = "INSERT INTO protocolo_servicos (id_sv, sv_nome, sv_descricao, sv_ativo, sv_pai, sv_codigo, sv_resp_1, sv_resp_2, sv_resp_3) 
						VALUES
							(1, 'Solicitação de cancelamento de Grupo', 'Solicitação de Alteração de Grupo de Pesquisa', 1, 'GRUPO', 'GR_CA', '', '', '');";
				$rlt = db_query($sql);

				return("");
				$sql = "
				CREATE TABLE protocolo_servicos (
					id_sv serial NOT NULL,
  					sv_nome char(100) NOT NULL,
  					sv_descricao text NOT NULL,
  					sv_ativo int8 NOT NULL,
  					sv_pai char(5) NOT NULL,
  					sv_codigo char(5) NOT NULL,
  					sv_resp_1 char(8) NOT NULL,
  					sv_resp_2 char(8) NOT NULL,
  					sv_resp_3 char(8) NOT NULL
					)	
				";
				$rlt = db_query($sql);
				$sql = "INSERT INTO protocolo_servicos (id_sv, sv_nome, sv_descricao, sv_ativo, sv_pai, sv_codigo, sv_resp_1, sv_resp_2, sv_resp_3) 
						VALUES
							(1, 'Grupo de Pesquisa', 'Solicitação de Criação, Alteração, Atualização ou cancelamento de Grupos de Pesquisa', 1, '', 'GRUPO', '', '', '');";
				$rlt = db_query($sql);
							

				
			}
	}

?>