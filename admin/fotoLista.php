<?php
# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "../_config.php" );
include_once( "../classes/utils.php" );
include_once( "../classes/DAO.php" );
include_once( "../classes/DBUtils.php" );
include_once( "../classes/fotos.php" );
# ------------------------------------------------------------------ #
session_start();
include_once( "include/autenticacao.php" );
# ------------------------------------------------------------------ #
	
$msg = @$_SESSION['bi-msg'];
$_SESSION['bi-msg'] = "";

$fotoLista = dao::find( 'fotos', array('id_galeria' => $_GET['id_galeria']));

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset=utf-8 />
		<title><?php echo PAGE_TITLE ?> - Área Administrativa</title>
		<link href="styles/styles.css" rel="stylesheet" type="text/css" />
		<script src="scripts/jquery-1.6.1.min.js"></script>
		<script src="scripts/functions.js"></script>
	</head>
	<body>
		<div class="aviso"><?php echo $msg ?></div>
		<div id="top"><a href="home.php"><img src="images/logo.jpg" alt="Home" title="Home" /></a></div>
		<div id="menu">
			<?php include( "include/menu.php" ); ?>
		</div>
		<h1>Fotos</h1>
		<div id="conteudo">
	        <a href="fotoView.php?id_galeria=<?php echo $_GET['id_galeria']; ?>">Nova</a>
			<table class="tabela">
				<tr>
					<th>Foto</th>
					<th class="acoes"> </th>
				</tr>
				<?php
				foreach ( $fotoLista as $cont => $foto)
				{
					if ( $cont % 2 == 0 )
						$class = "class=\"linhacinza\"";
					else
						$class = "";
					?>
					<tr <?php echo $class;?>>
						<td><img src="../thumb.php?img=<?php echo $foto->caminho; ?>&mw=50"></td>
						<td class="acoes"><a href="javascript:confirmarExcluir('fotoDelete.php?id=<?php echo $foto->id; ?>&id_galeria=<?php echo $_GET['id_galeria']; ?>')">Excluir</a></td>
					</tr>
					<?php
				}
				?>
			</table>
		</div>
	</body>
</html>