<header>
	<title>::Login - CIP ::</title>
	<script src="http://www2.pucpr.br/reol/eventos/cicpg/js/jquery.js"></script>
</header>
<?php
$link_login = 'http://localhost/projeto/JOSSO/login_pucpr/security_check.php';
$link_login = 'https://auth.pucpr.br/josso/signon/login.do?josso_back_to='.$link_login;

$link_logout = 'https://auth.pucpr.br/josso/signon/logout.do?josso_back_to='.$link_login;
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
			top : 0px;
			width: 100%;
		}
</style>
<?php
echo '<div id="header_cab"></div>'.chr(13).chr(10);
echo '<center>';
echo '<BR><BR>';
echo '<input type="button" value="LOGOUT" id="logout">';
echo '&nbsp;';
echo '<input type="button" value="LOGIN" id="login">';
?>
<script>
	$("#logout").click(function() {
		window.location.replace("<?php echo $link_logout;?>");
		});
	$("#login").click(function() {
		alert("OA-2"); 
		});		
</script>
