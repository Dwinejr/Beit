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

$quiz = new quiz( $_GET['id'] );
$result = dao::delete( $quiz );

if ( $result )
{
	$_SESSION['bi-msg'] = "Quiz excluido com sucesso.";
}
else {
	$_SESSION['bi-msg'] = "Não foi possível excluir o quiz.";
}

header( "Location: quizLista.php" );

?>