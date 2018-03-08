<?php

function loadClass( $className )
{
    $_str_file = 'classes/'.$className . '.class.php';
    if( file_exists( $_str_file ) )
        require_once( $_str_file );
}
spl_autoload_register( 'loadClass' );

session_start();


if(!isset($_SESSION['user']))
{
	header('Location: index.php');
	exit;
}
else
{
    $user = unserialize($_SESSION['user']);
}

if(isset($_GET['decon']))
{
	//session_destroy();
    unset($_SESSION['user']);
	header('Location: index.php');
	exit;
}

if(isset($_SESSION['user']))
{
    $user = unserialize($_SESSION['user']);
}

?>
<!DOCTYPE html>

<html lang="en">
<head>
   <title>Hylemagia</title>
   <meta type="description" content="">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width;user-scalable=no;initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="styles/index.css" />
   <link rel="icon" href="" type="image/x-icon">
</head>

<body>
	<header>
		<figure>
			<a href="index.php"><img src="medias/hylemagia.png" alt="Hylemagia - Jeux de strategie"></a>
		</figure>
        <a href="?decon">Fermer la session</a>
	</header>

	<main>
		<nav>
			<ul type="none">
				<li><a href="">Jouer</a></li>
                <li><a href="deck.php" alt="Modification de Deck" style="text-decoration: none;">Deck</a></li>
				<li><a href="user.php">Configuration</a></li>
			</ul>


		</nav>
	</main>

    <?php

    if(isset($user))
    {
       $_SESSION['user'] = serialize($user);
    }
    ?>
</body>
</html>
