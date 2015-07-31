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
	
$msg = @$_SESSION['bi-msg'];
$_SESSION['bi-msg'] = "";

if ( isset( $_GET['id'] ) )
{
	$quiz = quizDAO::getQuizRespostas( $_GET['id'] );

	if ( ! isset( $quiz->id ) )
	{
		$_SESSION['bi-msg'] = "Quiz não encontrado.";
		header("Location: quizLista.php");
		exit;
	}
}
else
{
	$_SESSION['bi-msg'] = "Nenhum quiz foi selecionado.";
	header("Location: quizLista.php");
	exit;
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
			<h1>Alternativas - <?php echo $quiz->pergunta ?></h1>
		</header>
		<div class="aviso"><?php echo $msg ?></div>
		<div id="conteudo">
			<a href="quizAlternativaView.php?id_quiz=<?php echo $quiz->id ?>">Novo</a>
			<table class="tabela">
				<tr>
					<th>Alternativa</th>
					<th class="acoes"> </th>
					<th class="acoes"> </th>
				</tr>
				<?php
				foreach ( $quiz->respostas as $cont => $quiz_resposta )
				{
					if ( $cont % 2 == 0 )
						$class = "class=\"linhacinza\"";
					else
						$class = "";
					?>
					<tr <?php echo $class; ?>>
						<td><?php echo $quiz_resposta->texto; ?></td>
						<td class="acoes"><a href="quizAlternativaView.php?id_quiz=<?php echo $quiz->id ?>&id=<?php echo $quiz_resposta->id; ?>">Editar</a></td>
						<td class="acoes"><a href="javascript:confirmarExcluir('quizAlternativaDelete.php?id=<?php echo $quiz_resposta->id; ?>')">Excluir</a></td>
					</tr>
					<?php
				}
				?>
			</table>
		</div>
	</body>
</html>