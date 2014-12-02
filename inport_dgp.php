<?php
require ("cab.php");
require ($include . 'sisdoc_debug.php');

require ($include . '_class_io.php');
$io = new io;

$link = 'http://dgp.cnpq.br/dgp/espelhogrupo/6967707566824740';
$link = 'http://dgp.cnpq.br/dgp/espelhogrupo/6130840789042882';
//$link = 'http://dgp.cnpq.br/dgp/espelhogrupo/2341074623884062';
$tx = $io -> load_file_local($link);
//$tx = $io->load_file_curl($link);
$tx = utf8_decode($tx);

$tx = troca($tx,'<div class="control-group">','####');
$tx = troca($tx,'<br />',';');

//echo strip_tags($tx);

$nome = busca($tx, 'NOME');
$update = busca($tx, 'LASTUPDATE');
$status = busca($tx,'STATUS');
$formacao = busca($tx,'CREATE');
$lider = busca($tx,'LIDER');
$area = busca($tx,'AREA');
$instituicao = busca($tx,'INSTITUICAO');
$unidade = busca($tx,'UNIDADE');


echo '<BR>Nome do Grupo: '.$nome;
echo '<BR>Atualizado em: '.$update;
echo '<BR>Situação: '.$status;
echo '<BR>Formação: '.$formacao;
echo '<BR>Área: '.$area;
echo '<BR>Instituição: '.$instituicao;
echo '<BR>Unidade: '.$unidade;

echo '<BR>Lider 1:'.$lider[0];
echo '<BR>Lider 2:'.$lider[1];

function busca($tx, $tag) {
	switch ($tag) {
		case 'AREA' :
			$st = 'Área predominante:';
			break;
		case 'NOME' :
			$st = 'Grupo de pesquisa';
			break;		
		case 'LASTUPDATE' :
			$st = 'Data do último envio';
			break;
		case 'STATUS':
			$st = 'Situação do grupo';
			break;
		case 'CREATE':
			$st = 'Ano de formação';
			break;	
		case 'LIDER':
			$st = 'Líder(es) do grupo:';
			break;	
		case 'INSTITUICAO':
			$st = 'Instituição do grupo:';
			break;				
		case 'UNIDADE':
			$st = 'Unidade:';
			break;				
	}

	$pos = strpos($tx, $st);
	$tx = strip_tags(substr($tx, $pos, strlen($tx)));
	$sb = '<div class="controls">';
	$pos = strpos($tx, $sb);

	switch ($tag) {
		case  'UNIDADE' :
			echo '================>'.$pos;
			$tx = substr($tx, ($pos + strlen($sb)), 300);
			echo '<HR>'.$tx.'<HR>';
			$tx = trim(substr($tx,0,strpos($tx,'Contato')));
			return($tx);
			break;	
		case  'INSTITUICAO' :
			$tx = substr($tx, ($pos + strlen($sb)), 300);
			$tx = trim(substr($tx,0,strpos($tx,'####')));
			return($tx);
			break;						
		case  'NOME' :
			$tx = substr($tx, ($pos + strlen($sb)), 300);
			$tx = trim(substr($tx,0,strpos($tx,'Endereço para acessar')));
			return($tx);
			break;		
		case  'LASTUPDATE' :
			$tx = substr($tx, ($pos + strlen($sb)), 300);
			$tx = sonumero($tx);
			$tx = substr($tx,4,4).substr($tx,2,2).substr($tx,0,2);
			return($tx);
			break;
		case  'AREA' :
			$tx = substr($tx, ($pos + strlen($sb)), 300);
			$tx = trim(substr($tx,0,strpos($tx,'####')));
			return($tx);
			break;			
		case  'STATUS' :
			$tx = substr($tx, ($pos + strlen($sb)), 300);
			echo '<HR>'.$tx.'<HR>';
			$tx = trim(substr($tx,0,strpos($tx,'####')));
			return($tx);
			break;
		case  'LIDER' :
			$tx = substr($tx, ($pos + strlen($sb)), strlen($tx));
			$tx = substr($tx,0,strpos($tx,'####'));
			$tx = troca($tx,'ui-button',';');
			$ld = splitx(';',$tx);
			$lider = array();
			for ($r=0;$r < count($ld);$r++)
				{
					
					$au = trim($ld[$r]);
					if (strpos($au,'})') > 0)
						{
							$au = '';
						} else {
							array_push($lider,$au);
						}
					
				}
			return($lider);
			break;			
		case 'CREATE':
			$tx = substr($tx, ($pos + strlen($sb)), 300);
			$tx = sonumero($tx);
			$tx = substr($tx,0,4);
			return($tx);
			break;
						
	}
}
?>