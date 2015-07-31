<?php
	header("Content-Type: text/html; charset=UTF-8",true);
	include("include/autenticacao.php");	
    $msg = $_SESSION['pi-msg'];
?>
<html>
	<body>
		<?php echo $msg ?>
	</body>
</html>