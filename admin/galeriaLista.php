<?php
# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "../_config.php" );
include_once( "../classes/utils.php" );
include_once( "../classes/DAO.php" );
include_once( "../classes/DBUtils.php" );
include_once( "../classes/galerias.php" );
# ------------------------------------------------------------------ #
session_start();
include_once( "include/autenticacao.php" );
# ------------------------------------------------------------------ #
	
$msg = @$_SESSION['bi-msg'];
$_SESSION['bi-msg'] = "";

$galeriaLista = dao::find( 'galerias', null, 'titulo asc' );

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
		<h1>Galerias</h1>
		<div id="conteudo">
			<a href="galeriaView.php">Nova</a>
			<table class="tabela">
				<tr>
					<th>Nome</th>
					<th class="acoes"></th>
					<th class="acoes"> </th>
					<th class="acoes"> </th>
				</tr>
				<?php
				foreach ( $galeriaLista as $cont => $galeria)
				{
					if ( $cont % 2 == 0 )
						$class = "class=\"linhacinza\"";
					else
						$class = "";
					?>
					<tr <?php echo $class;?>>
						<td>
							<?php echo $galeria->titulo; ?><br>
                       		<img src="../thumb.php?img=<?php echo $galeria->imagem; ?>&mw=150">
                        </td>
						<td class="acoes"><a href="fotoLista.php?id_galeria=<?php echo $galeria->id; ?>">Fotos</a></td>
						<td class="acoes"><a href="galeriaView.php?id=<?php echo $galeria->id; ?>">Editar</a></td>
						<td class="acoes"><a href="javascript:confirmarExcluir('galeriaDelete.php?id=<?php echo $galeria->id; ?>')">Excluir</a></td>
					</tr>
					<?php
				}
				?>
			</table>
		</div>
	</body>
</html>