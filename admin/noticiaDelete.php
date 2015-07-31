<?php

# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "../_config.php" );
include_once( "../classes/utils.php" );
include_once( "../classes/DAO.php" );
include_once( "../classes/DBUtils.php" );
include_once( "../classes/noticias.php" );
# ------------------------------------------------------------------ #
session_start();
include_once( "include/autenticacao.php" );
# ------------------------------------------------------------------ #

$noticia = new noticias( $_GET['id'] );
$result = dao::delete( $noticia );

if ( $result )
{
	$_SESSION['bi-msg'] = "Not&iacute;cia exclu&iacute;da com sucesso.";
}
else {
	$_SESSION['bi-msg'] = "Não foi possível excluir o notícia.";
}

header( "Location: noticiaLista.php" );

?>