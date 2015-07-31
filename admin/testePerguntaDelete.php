<?php

# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "../_config.php" );
include_once( "../classes/utils.php" );
include_once( "../classes/perguntaDAO.php" );
# ------------------------------------------------------------------ #
session_start();
include_once( "include/autenticacao.php" );
# ------------------------------------------------------------------ #

$teste_pergunta = new perguntas( $_GET['id'] );
$id_teste = $teste_pergunta->id_teste;
$result = dao::delete( $teste_pergunta );

if ( $result )
{
	$_SESSION['bi-msg'] = "Pergunta excluida com sucesso.";
}
else {
	$_SESSION['bi-msg'] = "Não foi possível excluir a pergunta.";
}

header( "Location: testePerguntaLista.php?id=" . $id_teste );

?>