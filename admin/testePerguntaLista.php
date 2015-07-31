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
	
$msg = @$_SESSION['bi-msg'];
$_SESSION['bi-msg'] = "";

if ( isset( $_GET['id'] ) )
{
	$teste = testeDAO::getTestePerguntas( $_GET['id'] );

	if ( ! isset( $teste->id ) )
	{
		$_SESSION['bi-msg'] = "Teste não encontrado.";
		header("Location: testeLista.php");
		exit;
	}
}
else
{
	$_SESSION['bi-msg'] = "Nenhum teste foi selecionado.";
	header("Location: testeLista.php");
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
			<h1>Perguntas - <?php echo $teste->titulo ?></h1>
		</header>
		<div class="aviso"><?php echo $msg ?></div>
		<div id="conteudo">
			<a href="testeLista.php">Voltar</a>
			<a href="testePerguntaView.php?id_teste=<?php echo $teste->id ?>">Novo</a>
			<table class="tabela">
				<tr>
					<th>Pergunta</th>
					<th class="acoes"> </th>
					<th class="acoes"> </th>
					<th class="acoes"> </th>
				</tr>
				<?php
				foreach ( $teste->perguntas as $cont => $pergunta )
				{
					if ( $cont % 2 == 0 )
						$class = "class=\"linhacinza\"";
					else
						$class = "";
					?>
					<tr <?php echo $class; ?>>
						<td><?php echo $pergunta->texto; ?></td>
						<td class="acoes"><a href="testeAlternativaLista.php?id=<?php echo $pergunta->id; ?>">Alternativas</a></td>
						<td class="acoes"><a href="testePerguntaView.php?id_teste=<?php echo $teste->id ?>&id=<?php echo $pergunta->id; ?>">Editar</a></td>
						<td class="acoes"><a href="javascript:confirmarExcluir('testePerguntaDelete.php?id=<?php echo $pergunta->id; ?>')">Excluir</a></td>
					</tr>
					<?php
				}
				?>
			</table>
		</div>
	</body>
</html>