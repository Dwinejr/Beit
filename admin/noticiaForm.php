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

$noticia = new noticias( $_POST['id'] );
$noticia->titulo = $_POST['titulo'];
$noticia->noticia = $_POST['noticia'];
$noticia->ativo = $_POST['ativo'];
$result = dao::save( $noticia );

if ( $result )
{
	$_SESSION['bi-msg'] = "Not&iacute;cia gravada com sucesso.";
}
else {
	$_SESSION['bi-msg'] = "Não foi possível salvar a not&iacute;cia.";
}

header("Location: noticiaLista.php");

?>