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

$quiz_resposta = new quiz_resposta( $_POST['id'] );
$quiz_resposta->id_quiz = $_POST['id_quiz'];
$quiz_resposta->texto = $_POST['texto'];
$result = dao::save( $quiz_resposta );

if ( $result )
{
	$_SESSION['bi-msg'] = "Alternativa gravada com sucesso.";
}
else {
	$_SESSION['bi-msg'] = "Não foi possível salvar a alternativa.";
}

header( "Location: quizAlternativaLista.php?id=" . $quiz_resposta->id_quiz );

?>