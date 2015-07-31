<?php

# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "../_config.php" );
include_once( "../classes/utils.php" );
include_once( "../classes/recadosDAO.php" );
# ------------------------------------------------------------------ #
session_start();
include_once( "include/autenticacao.php" );
# ------------------------------------------------------------------ #

$recado = new recados( $_GET['id'] );
$result = dao::delete( $recado );

if ( $result )
{
	$_SESSION['bi-msg'] = "Recado excluido com sucesso.";
}
else {
	$_SESSION['bi-msg'] = "Não foi possível excluir o recado.";
}

header( "Location: recadoLista.php" );

?>