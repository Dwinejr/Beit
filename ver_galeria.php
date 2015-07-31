<?php include("header.php"); 

	session_start();
	
	$hostname_conexao = "localhost";
	$username_conexao = "root";
	$password_conexao = "web";
	$banco_conexao = "painel_galeria";  

	define("PREFIXO", "plugin_");
	define("SISTEMA", "sistema");


	$conexao = mysql_connect($hostname_conexao, $username_conexao, $password_conexao) or die("Site em manutenção");
			
	mysql_select_db($banco_conexao, $conexao);

	$DadosLogado  = (isset($_SESSION['logado'])? $_SESSION['logado'] : '');

	$id_album = '';
	if (isset($_GET['album']))
		$id_album = $_GET['album'];
		
	$titulo_album = '';
	if (isset($_GET['titulo_album']))
		$titulo_album = $_GET['titulo_album'];

	$query_fotos_album   = mysql_query("SELECT id, foto FROM plugin_galeria_fotos WHERE album = '$id_album'", $conexao);
	$query_nome_album   = mysql_query("SELECT nome FROM plugin_galeria WHERE album = '$id_album'", $conexao);
?>
<body>
	<script src="scripts/galeria.js"></script>
	<!--<script src="scripts/pikachoose.js"></script>
	
		<script language="javascript">
				
			$(document).ready(
				function (){
					$(".galeria_interna").PikaChoose({user_thumbs:true, show_prev_next:false});
			});
			
		</script>-->
	
<?php include("topo-e-banner.php"); ?>
<div id="content" class="beit">
	<div style="padding-bottom:10px; border-bottom:1px dotted #d5d5d5; width:100%;"><span class="blue">
		<strong><?php echo $titulo_album ?></strong> – <a href="galeria.php">Voltar</a></span></div>
		<div class="pikachoose">
			<ul id="galeria" class="galeria_interna">
				<!--<li><a href="ver_galeria.php?album=1"><img src="img/capa_album.jpg" alt="Álbum" /></a></li>-->
				<?php while(list($id, $foto) = mysql_fetch_row($query_fotos_album)) { ?>
				<li><a href="#"><img ref="http://localhost/beit/painel_galeria/includes/thumb.php?i=http://localhost/beit/uploads/galeria/<?=$foto?>:530:0:p" src="http://localhost/beit/painel_galeria/includes/thumb.php?i=http://localhost/beit/uploads/galeria/<?=$foto?>:50:50:c"/></a></li>
				<?php } ?>				                                   
			</ul>
			<div id="capa">
				<img src="" alt=""/>
				<!--<div id="preloader"></div>-->
			</div>
		</div>
	</div>	
	
</div>
<?php include("rodape.php"); ?>
	