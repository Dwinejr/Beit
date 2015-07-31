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

$alternativa = new alternativas( $_POST['id'] );
$alternativa->id_pergunta = $_POST['id_pergunta'];
$alternativa->texto = $_POST['texto'];
$alternativa->correta = ( isset( $_POST['correta'] ) && $_POST['correta'] ) == 'S' ? 'S' : 'N';
$result = dao::save( $alternativa );

if ( $result )
{
	$_SESSION['bi-msg'] = "Alternativa gravada com sucesso.";
}
else {
	$_SESSION['bi-msg'] = "Não foi possível salvar a alternativa.";
}

header( "Location: testeAlternativaLista.php?id=" . $alternativa->id_pergunta );

?>