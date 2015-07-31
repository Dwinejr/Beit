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

$galeria = new galerias();

if ( isset( $_GET['id'] ) )
{
	$galeria = new galerias( $_GET['id'] );

	if ( ! isset( $galeria->id ) )
	{
		$_SESSION['bi-msg'] = "Não foi possível encontrar a galeria.";
		header( "Location: mensagens.php" );
	}
}
else
{
	$galeria->id = 0;
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
			<form action="galeriaForm.php" method="post" id="form" name="form" enctype="multipart/form-data">
				<label>
					T&iacute;tulo: <input type="text" name="titulo" value="<?php echo $galeria->titulo ?>" class="campos" />
				</label>
				<label>
					Descri&ccedil;&atilde;o: <input type="text" name="descricao" value="<?php echo $galeria->descricao?>" class="campos" />
				</label>
                <label>
                	Imagem: <input type="file" name="foto"  class="campos" />
                </label>
				<input type="hidden" name="id" value="<?php echo $galeria->id ?>">
				<input type="submit" class="botao" title="OK" value="OK"/>
				<input type="button" class="botao voltar" title="Voltar" value="Voltar"/>
			</form>
		</div>
	</body>
</html>