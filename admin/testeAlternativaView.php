<?php

# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "../_config.php" );
include_once( "../classes/utils.php" );
include_once( "../classes/perguntaDAO.php" );
include_once( "../classes/alternativaDAO.php" );
# ------------------------------------------------------------------ #
session_start();
include_once( "include/autenticacao.php" );
# ------------------------------------------------------------------ #

if ( !isset( $_GET['id_pergunta'] ) )
{
	$_SESSION['bi-msg'] = "Nenhuma pergunta foi selecionada.";
	header( "Location: testePerguntaLista.php" );
	exit;
}

$pergunta = new perguntas( $_GET['id_pergunta'] );
$alternativa = new alternativas();

if ( isset( $_GET['id'] ) )
{
	$alternativa = new alternativas( $_GET['id'] );

	if ( ! isset( $alternativa->id ) )
	{
		$_SESSION['bi-msg'] = "Não foi possível encontrar a alternativa.";
		header( "Location: mensagens.php" );
		exit;
	}
}
else
{
	$alternativa->id = 0;
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
			<h1>Alternativa - <?php echo $pergunta->texto ?></h1>
		</header>
		<div id="conteudo">
			<form action="testeAlternativaForm.php" method="post" id="form" name="form">
				<label>
					Alternativa: <input type="text" name="texto" value="<?php echo $alternativa->texto ?>" class="campos"/>
				</label>
				<label>
					Correta: <input type="checkbox" name="correta" value="S" <?php echo $alternativa->correta == 'S' ? 'checked' : '' ?> />
				</label>
				<input type="hidden" name="id" value="<?php echo $alternativa->id ?>" />
				<input type="hidden" name="id_pergunta" value="<?php echo $pergunta->id ?>" />
				<input type="submit" class="botao" title="OK" value="OK" />
				<input type="button" class="botao voltar" title="Voltar" value="Voltar" />
			</form>
		</div>
	</body>
</html>