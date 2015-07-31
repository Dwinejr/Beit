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

$aluno = new alunos( $_POST['id'] );
$aluno->nome = $_POST['nome'];
$aluno->email= $_POST['email'];
$aluno->ativo = $_POST['ativo'];
$result = dao::save( $aluno );

if ( $result )
{
	$_SESSION['bi-msg'] = "Aluno gravado com sucesso.";
}
else {
	$_SESSION['bi-msg'] = "Não foi possível salvar o aluno.";
}

header("Location: alunoLista.php");

?>