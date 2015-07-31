<?php

# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "../_config.php" );
include_once( "../classes/utils.php" );
include_once( "../classes/DAO.php" );
include_once( "../classes/DBUtils.php" );
include_once( "../classes/professores.php" );
# ------------------------------------------------------------------ #
session_start();
include_once( "include/autenticacao.php" );
# ------------------------------------------------------------------ #

$prof = new professores( $_POST['id'] );
$prof->nome = $_POST['nome'];
$prof->email = $_POST['email'];
$prof->senha = $_POST['senha'];
$prof->type = 'P';
$result = dao::save( $prof );

if ( $result )
{
	$_SESSION['bi-msg'] = "Professor gravado com sucesso.";
}
else {
	$_SESSION['bi-msg'] = "Não foi possível salvar o professor.";
}

header("Location: professorLista.php");

?>