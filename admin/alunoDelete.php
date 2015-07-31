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

$aluno = new alunos( $_GET['id'] );
$result = dao::delete( $aluno );

if ( $result )
{
	$_SESSION['bi-msg'] = "Aluno excluido com sucesso.";
}
else {
	$_SESSION['bi-msg'] = "Não foi possível excluir o aluno.";
}

header( "Location: alunoLista.php" );

?>