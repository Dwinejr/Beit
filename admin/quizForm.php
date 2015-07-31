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

$quiz = new quiz( $_POST['id'] );
$quiz->pergunta = $_POST['pergunta'];
$quiz->status = 'A';
$result = dao::save( $quiz );

if ( $result )
{
	$_SESSION['bi-msg'] = "Quiz gravado com sucesso.";
}
else {
	$_SESSION['bi-msg'] = "Não foi possível salvar o quiz.";
}

header("Location: quizLista.php");

?>