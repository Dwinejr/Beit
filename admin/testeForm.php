<?php

# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "../_config.php" );
include_once( "../classes/utils.php" );
include_once( "../classes/testeDAO.php" );
# ------------------------------------------------------------------ #
session_start();
include_once( "include/autenticacao.php" );
# ------------------------------------------------------------------ #

$teste = new testes( $_POST['id'] );
$teste->titulo = $_POST['titulo'];
$result = dao::save( $teste );

if ( $result )
{
	$_SESSION['bi-msg'] = "Teste gravado com sucesso.";
}
else {
	$_SESSION['bi-msg'] = "Não foi possível salvar o teste.";
}

header("Location: testeLista.php");

?>