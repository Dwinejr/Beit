<?php

# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include( "../_config.php" );
include( "../classes/utils.php" );
include( "../classes/DBUtils.php" );
include( "../classes/DAO.php" );
# ------------------------------------------------------------------ #
session_start();
include("include/autenticacao.php");
# ------------------------------------------------------------------ #

?>