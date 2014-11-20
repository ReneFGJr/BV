<header>
	<title>::Login - CIP ::</title>
</header>
<?php
$link_login = 'http://localhost/projetos/Research_Indicators/login_pucpr/security_check.php';
$link_scr = 'https://auth.pucpr.br/josso/signon/login.do?josso_back_to='.$link_login;
?>
<style>
	body
		{
			margin: 0px 0px 0px 0px;
		}
	.border0
		{
			border: 0px solid #FFFFFF;
		}
	#header_cab
		{
			height: 150px;
			background-image: url("img/header_login.png");
			background-repeat: no-repeat;
			background-position: center top;
			position: absolute;
			top : 0px;
			width: 100%;
		}
</style>

<?
echo '<div id="header_cab"></div>'.chr(13).chr(10);
echo '<iframe name="login-pucpr" src="'.$link_scr.'" height="100%" width="100%" class="border0" style="margin-top: 0px; z-index: 1;"></iframe>';

?>
