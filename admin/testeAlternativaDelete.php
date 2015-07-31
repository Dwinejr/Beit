<?php

# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "../_config.php" );
include_once( "../classes/utils.php" );
include_once( "../classes/alternativaDAO.php" );
# ------------------------------------------------------------------ #
session_start();
include_once( "include/autenticacao.php" );
# ------------------------------------------------------------------ #

$alternativa = new alternativas( $_GET['id'] );
$id_pergunta = $alternativa->id_pergunta;
$result = dao::delete( $alternativa );

if ( $result )
{
	$_SESSION['bi-msg'] = "Alternativa excluída com sucesso.";
}
else {
	$_SESSION['bi-msg'] = "Não foi possível excluir a alternativa.";
}

header( "Location: testeAlternativaLista.php?id=" . $id_pergunta );

?>