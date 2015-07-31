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

$foto = new fotos();

if ( isset( $_GET['id'] ) )
{
	$foto = new fotos( $_GET['id'] );

	if ( ! isset( $foto->id ) )
	{
		$_SESSION['bi-msg'] = "Não foi possível encontrar a galeria.";
		header( "Location: mensagens.php" );
	}
}
else
{
	$foto->id = 0;
}

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
		<div id="top"><a href="home.php"><img src="images/logo.jpg" alt="Home" title="Home" /></a></div>
		<div id="menu">
			<?php include( "include/menu.php" ); ?>
		</div>
		<div id="conteudo">
			<form action="fotoForm.php" method="post" id="form" name="form" enctype="multipart/form-data">  
				<label>
					Foto: <input type="file" name="foto"  class="campos" />
				</label>
				<input type="hidden" name="id_galeria" value="<?php echo $_GET['id_galeria']; ?>">
                <input type="hidden" name="id" value="">
				<input type="submit" class="botao" title="OK" value="OK"/>
				<input type="button" class="botao voltar" title="Voltar" value="Voltar"/>
			</form>
		</div>
	</body>
</html>