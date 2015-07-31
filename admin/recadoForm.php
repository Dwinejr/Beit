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

$recado = new recados( $_POST['id'] );
$recado->texto = $_POST['texto'];
$result = dao::save( $recado );

if ( $result )
{
	$_SESSION['bi-msg'] = "Recado gravado com sucesso.";
}
else {
	$_SESSION['bi-msg'] = "Não foi possível salvar o recado.";
}

header("Location: recadoLista.php");

?>