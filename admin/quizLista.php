<?php
# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "../_config.php" );
include_once( "../classes/utils.php" );
include_once( "../classes/quizDAO.php" );
# ------------------------------------------------------------------ #
session_start();
include_once( "include/autenticacao.php" );
# ------------------------------------------------------------------ #
	
$msg = @$_SESSION['bi-msg'];
$_SESSION['bi-msg'] = "";

$quizLista = quizDAO::getQuizzes();

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
		<h1>Pool</h1>
		<div id="conteudo">
			<a href="quizView.php">Novo</a>
			<table class="tabela">
				<tr>
					<th>Pergunta</th>
					<th>Status</th>
					<th class="acoes"> </th>
					<th class="acoes"> </th>
					<th class="acoes"> </th>
				</tr>
				<?php
				foreach ( $quizLista as $cont => $quiz )
				{
					if ( $cont % 2 == 0 )
						$class = "class=\"linhacinza\"";
					else
						$class = "";
					?>
					<tr <?php echo $class;?>>
						<td><?php echo $quiz->pergunta; ?></td>
						<td><?php echo $quiz->status_text; ?></td>
						<td class="acoes"><a href="quizAlternativaLista.php?id=<?php echo $quiz->id; ?>">Alternativas</a></td>
						<td class="acoes"><a href="quizView.php?id=<?php echo $quiz->id; ?>">Editar</a></td>
						<td class="acoes"><a href="javascript:confirmarExcluir('quizDelete.php?id=<?php echo $quiz->id; ?>')">Excluir</a></td>
					</tr>
					<?php
				}
				?>
			</table>
		</div>
	</body>
</html>