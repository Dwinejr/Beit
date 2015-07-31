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

$professor = new professores( $_GET['id'] );
$result = dao::delete( $professor );

if ( $result )
{
	$_SESSION['bi-msg'] = "Professor excluido com sucesso.";
}
else {
	$_SESSION['bi-msg'] = "Não foi possível excluir o professor.";
}

header( "Location: professorLista.php" );

?>