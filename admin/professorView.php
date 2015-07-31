<?php

# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "../_config.php" );
include_once( "../classes/utils.php" );
include_once( "../classes/DAO.php" );
include_once( "../classes/DBUtils.php" );
include_once( "../classes/professores.php" );
# ------------------------------------------------------------------ #
session_start();
include_once( "include/autenticacao.php" );
# ------------------------------------------------------------------ #

$prof = new professores();

if ( isset( $_GET['id'] ) )
{
	$prof = new professores( $_GET['id'] );

	if ( ! isset( $prof->id ) )
	{
		$_SESSION['bi-msg'] = "Não foi possível encontrar o professor.";
		header( "Location: mensagens.php" );
	}
}
else
{
	$prof->id = 0;
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
			<form action="professorForm.php" method="post" id="form" name="form">
				<label>
					Nome: <input type="text" name="nome" value="<?php echo $prof->nome ?>" class="campos" />
				</label>
				<label>
					Email: <input type="text" name="email" value="<?php echo $prof->email ?>" class="campos" />
				</label>
				<label>
					Senha: <input type="password" name="senha" value="<?php echo $prof->senha ?>" class="campos" />
				</label>
				<input type="hidden" name="id" value="<?php echo $prof->id ?>">
				<input type="submit" class="botao" title="OK" value="OK"/>
				<input type="button" class="botao voltar" title="Voltar" value="Voltar"/>
			</form>
		</div>
	</body>
</html>