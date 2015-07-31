<?php

if ( ! get_logged_user_id() )
{
	header( 'Location:index.php?er=3' );
	exit;
}

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

?>