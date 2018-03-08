<?php
/**
 * Created by PhpStorm.
 * User: Sxt
 * Date: 17/01/2018
 * Time: 10:43
 */

/**
 * loadClass Inclure un fichier en fonction de son nom
 * @param  string $className Nom de la classe
 */
function loadClass( $className ) {
    $_file_ = 'classes/' . strtolower( $className ) . '.class.php';
    if( file_exists( $_file_ ) )
        require_once( $_file_ );

    $_file_ = 'interfaces/' . strtolower( $className ) . '.int.php';
    if( file_exists( $_file_ ) )
        require_once( $_file_ );
}

spl_autoload_register( 'loadClass' ); // On lance la procédure d'auto-chargement des classes avec la fonction "includeClass" en callback.


if (isset($_POST['valid'])){
    $connect= new UserModel();
    if ($connect-> createNews($_POST['pseudo'], $_POST['mail']) === true){
        echo "mail enregistré.<br>";
    }
}

if (isset($_POST['delete'])){
    $connect= new UserModel();
    if ($connect-> deleteNews($_POST['mail']) === true){
        echo "mail supprimé.<br>";
    }
}

if (isset($_POST['inscrire'])){
    $connect= new UserModel();
    if ($connect-> createUser($_POST['name'], $_POST['lname'], $_POST['bday'], $_POST['mail'], $_POST['pseudo'], $_POST['pass']) === true){
        echo "utilisateur enregistré.<br>";
    }
}

if (isset($_POST['deleteuser'])){
    $connect= new UserModel();
    if ($connect-> deleteUser($_POST['user_id']) === true){
        echo "utilisateur supprimé.<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire</title>
</head>
<body>
<label for="adduser">Ajouter utilisateur mailling</label>
<form action="" method="post" id="adduser">
    <input type="text" name="pseudo" placeholder="pseudo">
    <input type="email" name="mail" placeholder="mail">
    <input type="submit" name="valid">
</form>
<label for="deluser">Supprimer utilisateur mailling</label>
<form action="" method="post" id="deluser">
    <input type="email" name="mail" placeholder="mail">
    <input type="submit" name="delete">
</form>
<hr>
<label for="addcpt">Ajouter utilisateur</label>
<form action="" method="post" id="addcpt">
    <input type="text" name="name" placeholder="Prenom">
    <input type="text" name="lname" placeholder="nom">
    <input type="date" name="bday" placeholder="Date de naissance">
    <input type="email" name="mail" placeholder="mail">
    <input type="text" name="pseudo" placeholder="pseudo">
    <input type="password" name="pass" placeholder="Mot de passe">
    <input type="submit" name="inscrire">
</form>
<label for="deleteuser">Supprimer utilisateur</label>
<form action="" method="post" id="deleteuser">
    <input type="text" name="user_id" placeholder="user_id">
    <input type="submit" name="deleteuser">
</form>
<hr>
</body>
</html>
