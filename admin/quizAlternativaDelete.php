<?php

# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "../_config.php" );
include_once( "../classes/utils.php" );
include_once( "../classes/quizRespostaDAO.php" );
# ------------------------------------------------------------------ #
session_start();
include_once( "include/autenticacao.php" );
# ------------------------------------------------------------------ #

$quiz_resposta = new quiz_resposta( $_GET['id'] );
$id_quiz = $quiz_resposta->id_quiz;
$result = dao::delete( $quiz_resposta );

if ( $result )
{
	$_SESSION['bi-msg'] = "Alternativa excluida com sucesso.";
}
else {
	$_SESSION['bi-msg'] = "Não foi possível excluir a alternativa.";
}

header( "Location: quizAlternativaLista.php?id=" . $id_quiz );

?>