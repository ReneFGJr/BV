<?php
//require("_pucpr_login.php");
/*
 *	$Id: sslclient.php,v 1.1 2004/01/09 03:23:42 snichol Exp $
 *
 *	SSL client sample.
 *
 *	Service: SOAP endpoint
 *	Payload: rpc/encoded
 *	Transport: https
 *	Authentication: none
 */
require_once ('../login_pucpr/nusoap/nusoap.php');

echo '<BR>:::' . $codigo;
echo '<BR>:::' . $senha;
echo '<BR>';

	echo '<HR>0<HR>';
	/* Initialize parameter */
	$param = array('login' => $codigo, 'senha' => $senha);

	/* create the client for my rpc/encoded web service */
	$wsdl = 'https://sarch.pucpr.br:8100/services/AutenticacaoSOA?wsdl';
	// $mynamespace = "http://phonedirlux.homeip.net/types"; no more need of this...
	echo '<HR>1<HR>';
	$client = new soapclient($wsdl, true);
	echo '<HR>2<HR>';
	/* call readLS */
        // Let NuSoap extract the correct target namespace from the WSDL!
	$response = $client->call('autenticarUsuario', $param);
	print_r($response);
	echo $response;
?>
