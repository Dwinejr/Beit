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
	
$msg = @$_SESSION['bi-msg'];
$_SESSION['bi-msg'] = "";

if ( isset( $_GET['id'] ) )
{
	$pergunta = perguntaDAO::getPerguntaAlternativas( $_GET['id'] );

	if ( ! isset( $pergunta->id ) )
	{
		$_SESSION['bi-msg'] = "Pergunta não encontrado.";
		header("Location: perguntaLista.php");
		exit;
	}
}
else
{
	$_SESSION['bi-msg'] = "Nenhuma pergunta foi selecionada.";
	header("Location: perguntaLista.php");
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
			<h1>Alternativas - <?php echo $pergunta->texto ?></h1>
		</header>
		<div class="aviso"><?php echo $msg ?></div>
		<div id="conteudo">
			<a href="testePerguntaLista.php?id=<?php echo $pergunta->id_teste ?>">Voltar</a>
			<a href="testeAlternativaView.php?id_pergunta=<?php echo $pergunta->id ?>">Novo</a>
			<table class="tabela">
				<tr>
					<th>Alternativa</th>
					<th class="acoes"> </th>
					<th class="acoes"> </th>
				</tr>
				<?php
				foreach ( $pergunta->alternativas as $cont => $alternativa )
				{
					if ( $cont % 2 == 0 )
						$class = "class=\"linhacinza\"";
					else
						$class = "";
					?>
					<tr <?php echo $class; ?>>
						<td><?php echo $alternativa->texto; ?></td>
						<td class="acoes"><a href="testeAlternativaView.php?id_pergunta=<?php echo $pergunta->id ?>&id=<?php echo $alternativa->id; ?>">Editar</a></td>
						<td class="acoes"><a href="javascript:confirmarExcluir('testeAlternativaDelete.php?id=<?php echo $alternativa->id; ?>')">Excluir</a></td>
					</tr>
					<?php
				}
				?>
			</table>
		</div>
	</body>
</html>