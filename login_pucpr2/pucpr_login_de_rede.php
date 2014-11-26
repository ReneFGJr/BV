<?
require("cab.php");
//require($include."sisdoc_windows.php");
require($include."_class_form.php");
$form = new form;
function msg($x) { return($x); }
global $bgc;

		$tabela = '';
		$cp = array();
		array_push($cp,array('$H8','','',False,True,''));
		array_push($cp,array('$S30','','Login de rede',True,True,''));
		array_push($cp,array('$P30','','Senha',True,True,''));

		echo $form->editar($cp,'');
		
if ($form->saved > 0)
{
	$tipo_nome = "Integraчуo de Login de Rede";
	$codigo = $dd[1];
	$senha = $dd[2];
	require("pucpr_soap_autenticarUsuario.php");
}
require("foot.php");
?>