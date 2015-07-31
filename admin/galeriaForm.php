<?php

# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "../_config.php" );
include_once( "../classes/utils.php" );
include_once( "../classes/DAO.php" );
include_once( "../classes/DBUtils.php" );
include_once( "../classes/galerias.php" );
# ------------------------------------------------------------------ #
session_start();
include_once( "include/autenticacao.php" );
# ------------------------------------------------------------------ #

$extensoes = array('JPG','GIF','PNG');
$arquivo   = $_FILES['foto'];
$pathInfo  = pathinfo($arquivo['name']);
$extensao  = $pathInfo['extension'];
if (!in_array(strtoupper($extensao), $extensoes))
{
	$_SESSION['bi-msg'] = 'Extensão da foto inválida.';
}
else
{
	$nome_arquivo = uniqid('').'.'.$extensao;
	$pasta        = '../fotos/';
	if (move_uploaded_file($_FILES['foto']['tmp_name'], $pasta.$nome_arquivo))
	{
		$galeria = new galerias( $_POST['id'] );
		$galeria->titulo = $_POST['titulo'];
		$galeria->descricao= $_POST['descricao'];
		$galeria->imagem = $nome_arquivo;
		$result = dao::save( $galeria );
		
		if ( $result )
		{
			$_SESSION['bi-msg'] = "Galeria gravada com sucesso.";
		}
		else {
			$_SESSION['bi-msg'] = "Não foi possível salvar a galeria.";
		}
	}
	else
	{
		$_SESSION['bi-msg'] = "Não foi possível salvar a foto.";
	}
}
header("Location: galeriaLista.php");

?>