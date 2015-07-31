<?php

# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "../_config.php" );
include_once( "../classes/utils.php" );
include_once( "../classes/quizDAO.php" );
include_once( "../classes/quizRespostaDAO.php" );
# ------------------------------------------------------------------ #
session_start();
include_once( "include/autenticacao.php" );
# ------------------------------------------------------------------ #

if ( !isset( $_GET['id_quiz'] ) )
{
	$_SESSION['bi-msg'] = "Nenhum quiz foi selecionado.";
	header( "Location: quizLista.php" );
	exit;
}

$quiz = new quiz( $_GET['id_quiz'] );
$quiz_resposta = new quiz_resposta();

if ( isset( $_GET['id'] ) )
{
	$quiz_resposta = new quiz_resposta( $_GET['id'] );

	if ( ! isset( $quiz_resposta->id ) )
	{
		$_SESSION['bi-msg'] = "Não foi possível encontrar a alternativa.";
		header( "Location: mensagens.php" );
		exit;
	}
}
else
{
	$quiz_resposta->id = 0;
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
			<h1>Alternativa - <?php echo $quiz->pergunta ?></h1>
		</header>
		<div id="conteudo">
			<form action="quizAlternativaForm.php" method="post" id="form" name="form">
				<label>
					Resposta: <input type="text" name="texto" value="<?php echo $quiz_resposta->texto ?>" />
				</label>
				<input type="hidden" name="id" value="<?php echo $quiz_resposta->id ?>" />
				<input type="hidden" name="id_quiz" value="<?php echo $quiz->id ?>" />
				<input type="submit" class="botao" title="OK" value="OK" />
				<input type="button" class="botao voltar" title="Voltar" value="Voltar" />
			</form>
		</div>
	</body>
</html>