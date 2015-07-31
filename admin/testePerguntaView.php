<?php

# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "../_config.php" );
include_once( "../classes/utils.php" );
include_once( "../classes/testeDAO.php" );
include_once( "../classes/perguntaDAO.php" );
# ------------------------------------------------------------------ #
session_start();
include_once( "include/autenticacao.php" );
# ------------------------------------------------------------------ #

if ( !isset( $_GET['id_teste'] ) )
{
	$_SESSION['bi-msg'] = "Nenhum teste foi selecionado.";
	header( "Location: testeLista.php" );
	exit;
}

$teste = new testes( $_GET['id_teste'] );
$teste_pergunta = new perguntas();

if ( isset( $_GET['id'] ) )
{
	$teste_pergunta = new perguntas( $_GET['id'] );

	if ( ! isset( $teste_pergunta->id ) )
	{
		$_SESSION['bi-msg'] = "Não foi possível encontrar a pergunta.";
		header( "Location: mensagens.php" );
		exit;
	}
}
else
{
	$teste_pergunta->id = 0;
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
		<header>
			<div id="top"><a href="home.php"><img src="images/logo.jpg" alt="Home" title="Home" /></a></div>
			<div id="menu">
				<?php include( "include/menu.php" ); ?>
			</div>
			<h1>Teste - <?php echo $teste->titulo ?></h1>
		</header>
		<div id="conteudo">
			<form action="testePerguntaForm.php" method="post" id="form" name="form">
				<label>
					Pergunta: <input type="text" name="texto" value="<?php echo $teste_pergunta->texto ?>" class="campos"/>
				</label>
				<input type="hidden" name="id" value="<?php echo $teste_pergunta->id ?>" />
				<input type="hidden" name="id_teste" value="<?php echo $teste->id ?>" />
				<input type="submit" class="botao" title="OK" value="OK" />
				<input type="button" class="botao voltar" title="Voltar" value="Voltar" />
			</form>
		</div>
	</body>
</html>