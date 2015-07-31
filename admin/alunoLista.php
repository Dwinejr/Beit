<?php
# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "../_config.php" );
include_once( "../classes/utils.php" );
include_once( "../classes/DAO.php" );
include_once( "../classes/DBUtils.php" );
include_once( "../classes/alunos.php" );
# ------------------------------------------------------------------ #
session_start();
include_once( "include/autenticacao.php" );
# ------------------------------------------------------------------ #
	
$msg = @$_SESSION['bi-msg'];
$_SESSION['bi-msg'] = "";

$alunoLista = dao::find( 'alunos', null, 'nome asc' );

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
		<h1>Alunos</h1>
		<div id="conteudo">
			<a href="alunoView.php">Novo</a>
			<table class="tabela">
				<tr>
					<th>Nome</th>
					<th class="acoes">Ativo</th>
					<th class="acoes"></th>
					<th class="acoes"> </th>
					<th class="acoes"> </th>
				</tr>
				<?php
				foreach ( $alunoLista as $cont => $aluno )
				{
					if ( $cont % 2 == 0 )
						$class = "class=\"linhacinza\"";
					else
						$class = "";
					?>
					<tr <?php echo $class;?>>
						<td><?php echo $aluno->nome; ?></td>
						<td class="acoes"><?php echo $aluno->ativo; ?></td>
						<td class="acoes"><a href="lessonLista.php?id_aluno=<?php echo $aluno->id; ?>">Lessons</a></td>
						<td class="acoes"><a href="alunoView.php?id=<?php echo $aluno->id; ?>">Editar</a></td>
						<td class="acoes"><a href="javascript:confirmarExcluir('alunoDelete.php?id=<?php echo $aluno->id; ?>')">Excluir</a></td>
					</tr>
					<?php
				}
				?>
			</table>
		</div>
	</body>
</html>