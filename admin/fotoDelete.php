<?php

# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "../_config.php" );
include_once( "../classes/utils.php" );
include_once( "../classes/DAO.php" );
include_once( "../classes/DBUtils.php" );
include_once( "../classes/fotos.php" );
# ------------------------------------------------------------------ #
session_start();
include_once( "include/autenticacao.php" );
# ------------------------------------------------------------------ #

$foto = new fotos( $_GET['id'] );
if (file_exists('../fotos/'.$foto->caminho))
{
	unlink('../fotos/'.$foto->caminho);
}
$result = dao::delete( $foto);

if ( $result )
{
	$_SESSION['bi-msg'] = "Foto excluida com sucesso.";
}
else {
	$_SESSION['bi-msg'] = "Não foi possível excluir a foto.";
}

header( "Location: fotoLista.php?id_galeria=".$_GET['id_galeria'] );

?>