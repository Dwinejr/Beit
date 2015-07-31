<?php

# ------------------------------------------------------------------ #
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
# ------------------------------------------------------------------ #
include_once( "../_config.php" );
include_once( "../classes/utils.php" );
include_once( "../classes/DAO.php" );
include_once( "../classes/DBUtils.php" );
include_once( "../classes/noticias.php" );
# ------------------------------------------------------------------ #
session_start();
include_once( "include/autenticacao.php" );
# ------------------------------------------------------------------ #

$noticia = new noticias();

if ( isset( $_GET['id'] ) )
{
	$noticia = new noticias( $_GET['id'] );

	if ( ! isset( $noticia->id ) )
	{
		$_SESSION['bi-msg'] = "Não foi possível encontrar a not&iacute;cia.";
		header( "Location: mensagens.php" );
	}
}
else
{
	$noticia->id = 0;
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset=utf-8 />
		<title><?php echo PAGE_TITLE ?> - Área Administrativa</title>
		<link href="styles/styles.css" rel="stylesheet" type="text/css" />
		<script src="scripts/jquery-1.6.1.min.js"></script>
		<script src="scripts/functions.js"></script>
	</head>
	<body>
		<div id="top"><a href="home.php"><img src="images/logo.jpg" alt="Home" title="Home" /></a></div>
		<div id="menu">
			<?php include( "include/menu.php" ); ?>
		</div>
		<div id="conteudo">
			<form action="noticiaForm.php" method="post" id="form" name="form">
				<label>
					T&iacute;tulo: <input type="text" name="titulo" value="<?php echo $noticia->titulo?>" class="campos" />
				</label>
                <label style="vertical-align:auto">
					Not&iacute;cia: <textarea name="noticia" rows="6" ><?php echo $noticia->noticia ?></textarea>
				</label>
                 <label>
					Ativo: <select name="ativo" class="campos">
                    <option value=""></option>
                    <option value="S" <?php if ($noticia->ativo == 'S') { echo 'SELECTED';} ?>>Sim</option>
                    <option value="N" <?php if ($noticia->ativo == 'N') { echo 'SELECTED';} ?>>Não</option>
                    </select>
				</label>
				<input type="hidden" name="id" value="<?php echo $noticia->id ?>">
				<input type="submit" class="botao" title="OK" value="OK"/>
				<input type="button" class="botao voltar" title="Voltar" value="Voltar"/>
			</form>
		</div>
	</body>
</html>