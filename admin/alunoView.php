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

$aluno = new alunos();

if ( isset( $_GET['id'] ) )
{
	$aluno = new alunos( $_GET['id'] );

	if ( ! isset( $aluno->id ) )
	{
		$_SESSION['bi-msg'] = "Não foi possível encontrar o aluno.";
		header( "Location: mensagens.php" );
	}
}
else
{
	$aluno->id = 0;
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
			<form action="alunoForm.php" method="post" id="form" name="form">
				<label>
					Nome: <input type="text" name="nome" value="<?php echo $aluno->nome ?>" class="campos" />
				</label>
                <label>
					Email: <input type="text" name="email" value="<?php echo $aluno->email ?>" class="campos" />
				</label>
                 <label>
					Ativo: <select name="ativo" class="campos">
                    <option value=""></option>
                    <option value="S" <?php if ($aluno->ativo == 'S') { echo 'SELECTED';} ?>>Sim</option>
                    <option value="N" <?php if ($aluno->ativo == 'N') { echo 'SELECTED';} ?>>Não</option>
                    </select>
				</label>
				<input type="hidden" name="id" value="<?php echo $aluno->id ?>">
				<input type="submit" class="botao" title="OK" value="OK"/>
				<input type="button" class="botao voltar" title="Voltar" value="Voltar"/>
			</form>
		</div>
	</body>
</html>