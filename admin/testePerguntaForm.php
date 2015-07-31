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

$teste_pergunta = new perguntas( $_POST['id'] );
$teste_pergunta->id_teste = $_POST['id_teste'];
$teste_pergunta->texto = $_POST['texto'];
$result = dao::save( $teste_pergunta );

if ( $result )
{
	$_SESSION['bi-msg'] = "Pergunta gravada com sucesso.";
}
else {
	$_SESSION['bi-msg'] = "Não foi possível salvar a pergunta.";
}

header( "Location: testePerguntaLista.php?id=" . $teste_pergunta->id_teste );

?>