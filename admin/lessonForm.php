<?php

# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "../_config.php" );
include_once( "../classes/utils.php" );
include_once( "../classes/DAO.php" );
include_once( "../classes/DBUtils.php" );
include_once( "../classes/licoes.php" );
include_once( "../classes/alunos.php" );
include_once( "../classes/professores.php" );
include_once( "../classes/professoresDAO.php" );
# ------------------------------------------------------------------ #
session_start();
include_once( "include/autenticacao.php" );
# ------------------------------------------------------------------ #


$licao = new licoes( $_POST['id'] );
$licao->id_professor = $_POST['id_professor'];
$licao->id_aluno = $_POST['id_aluno'];
$licao->data = util::data2banco($_POST['data']);
$licao->lesson = utf8_decode($_POST['lesson']);
$licao->comentarios = utf8_decode($_POST['comentarios']);
$licao->p = $_POST['p'];
$licao->s = $_POST['s'];
$licao->r = $_POST['r'];
$licao->l = $_POST['l'];
$licao->w = $_POST['w'];


$result = dao::save( $licao );

# envia email
$professor = professoresDAO::getProfessoresById($_SESSION['prof_id']);
$aluno     = DAO::find('alunos', array('id' => $_POST['id_aluno']));
$send      = util::send_email(utf8_decode($aluno[0]->nome), utf8_decode($_POST['lesson']), 'backup@beitschool.com', $professor[0]->email);

if ( $result )
{
	$_SESSION['b-msg'] = "Lição gravada com sucesso.";
}
else {
	$_SESSION['b-msg'] = "Não foi possível salvar a lição.";
}

header("Location: alunoLista.php?result=" . $result);

?>