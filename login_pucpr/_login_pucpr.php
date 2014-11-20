<?php
$link_login = 'http://localhost/projetos/Research_Indicators/login_pucpr/josso-security-check.php';
$link_logout = 'http://localhost/projetos/Research_Indicators/login_pucpr/_login.php';

$link_scr1 = 'https://auth.pucpr.br/josso/signon/login.do?josso_back_to='.$link_login;
$link_scr2 = 'https://auth.pucpr.br/josso/signon/logout.do?josso_back_to='.$link_logout;
require("josso.php");
echo '<A HREF="'.$link_scr1.'">LOGIN</A>';
echo '<BR>';
echo '<A HREF="'.$link_scr2.'">LOGOUT</A>';
?>