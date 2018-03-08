<?php
include ("../function/function_hero_dialog.php");
?>

<!DOCTYPE html>

<html lang="en">
<head>
   <title>Titre</title>
   <meta type="description" content="">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0">
   <!-- CSS -->
   <link rel="stylesheet" type="text/css" href="css/index.css" />
   <link rel="stylesheet" href="css/Style_carte_init.css" />
   <!-- FONTS -->
   <link rel="icon" href="" type="image/x-icon">

</head>

<body>
    <header>
        <figure>
            <img alt="Logo Hylemagia" src="medias/logo.PNG">
        </figure>
        <iframe src="http://www.decompte.net/compte-a-rebours.php?c=1531130400&s=0&r=0" width="468" height="50" marginheight="0" marginwidth="0" align="middle" scrolling="No" frameborder="0">iframe désactivée</iframe>
    </header>

    <main>
        <section id="sectionMain">
        <article id="heroes">
            <p id="decripHisto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis vehicula leo. Donec iaculis neque eros, eu ultrices turpis vehicula vel. Ut a sagittis ante. Sed sagittis est quis odio sollicitudin, nec rhoncus ligula finibus. Fusce nec sollicitudin nibh. Maecenas dictum vel nibh non imperdiet. Aliquam aliquet enim et lorem malesuada finibus. Ut feugiat, sapien et tristique convallis, orci ipsum dignissim sapien, ut semper enim lorem ac felis. Praesent sed eros metus. Vivamus nec eros magna. In ac metus quis felis posuere tempus ac vel quam. Sed tempus justo velit, rhoncus efficitur nulla mollis in. Ut fringilla neque a gravida ultrices. Fusce tempus laoreet arcu vitae viverra.</p>

          <div id="hero_animation">

            <section class="container">
            <div id="card">
              <figure class="front"></figure>
              <figure class="back"></figure>
            </div>
            </section>
            <div class="bulle1"></div>


              <section id="options3">
                <form method="post" action="?pdiag=<?php echo (isset($_GET['pdiag'])? $_GET['pdiag']+1 : 1); ?>"><button id="flip3">Dialogue</button></form>
              </section>

        <div class="bulle2"></div>
        <section class="container2">
          <div id="card2">
            <figure class="front2"></figure>
            <figure class="back2"></figure>
          </div>

        </section>
        </div>


        </article>
        <aside id="forms">
            <article id="formUsers">
<<<<<<< HEAD
              <h2>Création de compte</h2>
              <form action="" method="post" accept-charset="utf-8">
                <input type="text" name="nom" value="" placeholder="Nom">
                <input type="text" name="prenom" value="" placeholder="Prénom">
                <input type="date" name="birth" value="" placeholder="Date de naissance">
                <input type="email" name="mail" value="" placeholder="Email">
                <input type="text" name="pays" value="" placeholder="Pays">
                <input type="text" name="pseudo" value="" placeholder="Pseudo">
                <input type="password" name="pass" value="" placeholder="Mot de passe">
                <input id="flip3" type="submit" name="valid" value="Créer le compte">
              </form>
            </article>
            <article id="formNews">
              <h2>Inscription Newsletter</h2>
              <form action="" method="post" accept-charset="utf-8">
                <input type="text" name="pseudo" value="" placeholder="Pseudo">
                <input type="email" name="mail" value="" placeholder="Email">
              </form>
=======
            <form action="" method="POST">
              <h2>Inscription Hylemagia</h2>
              <input type="text" name="nom" placeholder="nom" class="form">
              <input type="text" name="prenom" placeholder="prenom" class="form">
              <input type="text" name="pseudo" placeholder="pseudo" class="form">
              <input type="password" name="password" placeholder="password" class="form">
              <input type="email" name="email" placeholder="email" class="form">
              <input type="submit" name="valider" value="valider" class="validerForm">
            </form>
            </article>
            <article id="formNews">
              <h2>Inscription Newsletter</h2>
              <input type="text" name="pseudo" placeholder="pseudo" class="formul">
              <input type="email" name="email" placeholder="email" class="formul">
              <input type="submit" name="valider" value="valider" class="validerNews">
>>>>>>> b420053a310310460ae490f0fa049323f28c4a4f
            </article>
        </aside>
        </section>
    </main>

    <footer>

    </footer>

<?php
// condition changement carte si lancement de GET
if(isset($_GET['pdiag']))
{
    ?>

    <style type="text/css">

    /*------------hero1 card-----------------*/
    #card .front {
      background-image: url("medias/hero_drake.png");
    background-size: 100% 42.355vh;
    background-repeat: no-repeat;
    height:42.355vh;


    }
    #card .back {
      transform: rotateY( 180deg );
      background-image: url("medias/dosCarte.png");
    background-size: 100% 42.355vh;
    background-repeat: no-repeat;
    height:42.355vh;

    }

    #card.flipped {
      transform: rotateY( 180deg );
    }


    /*------------hero2 card-----------------*/

    #card2 .front2 {
<<<<<<< HEAD
      background-image: url("medias/hero_HF.png");
=======
      background-image: url("medias/hero_fantasy.png");
>>>>>>> b420053a310310460ae490f0fa049323f28c4a4f
  background-size: 100% 42.355vh;
  background-repeat: no-repeat;
  height:42.355vh;
    }
    #card2 .back2 {
      transform: rotateY( 180deg );
      background-image: url("medias/dosCarte.png");
    background-size: 100% 42.355vh;
    height:42.355vh;
    background-repeat: no-repeat;
    }


</style>

<?php } ?>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript">

$('#card').on('click', function(e) {
    e.preventDefault();

    $('#card').toggleClass('flipped');
});

$('#card2').on('click', function(e) {
    e.preventDefault();

    $('#card2').toggleClass('flipped2');
});

</script>
</body>
</html>
