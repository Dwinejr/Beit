<?php

# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "../_config.php" );
include_once( "../classes/utils.php" );
include_once( "../classes/recadosDAO.php" );
# ------------------------------------------------------------------ #
session_start();
include_once( "include/autenticacao.php" );
# ------------------------------------------------------------------ #

$recado = new recados();

if ( isset( $_GET['id'] ) )
{
	$recado = new recados( $_GET['id'] );

	if ( ! isset( $recado->id ) )
	{
		$_SESSION['bi-msg'] = "Não foi possível encontrar o recado.";
		header( "Location: mensagens.php" );
	}
}
else
{
	$recado->id = 0;
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
			<form action="recadoForm.php" method="post" id="form" name="form">
				<label>
					Recado: <input type="text" name="texto" value="<?php echo $recado->texto ?>" class="campos"/>
				</label>
				<input type="hidden" name="id" value="<?php echo $recado->id ?>">
				<input type="submit" class="botao" title="OK" value="OK"/>
				<input type="button" class="botao voltar" title="Voltar" value="Voltar"/>
			</form>
		</div>
	</body>
</html>