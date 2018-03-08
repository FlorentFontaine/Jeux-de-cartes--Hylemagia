<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> BDD HYLEMAGIA</title>
    <link rel="stylesheet" type="text/css" href="formulaire_acces_Bdd.css">

</head>
<body>
    <header>
        <h1>MODIFICATION DE LA BASE DE DONNEE HYLEMAGIA</h1>
    </header>
    <main class="main">
       <form action="" method="post">
            <label for="ajouter">Ajouter une carte</label>
            <input id="ajouter" type="radio" name="action">
            <br>
                <form action="" method="post">
                    <input type="text" name="nom" placeholder="nom" value="">
                    <input type="textarea" name="description" placeholder="description">
                    <input type="text" name="att" placeholder="Attaque">
                    <input type="text" name="PV" placeholder="Point(s) de vie">
                    <input type="text" name="mana" placeholder="Mana">
                    <input type="text" name="spec" placeholder="Capacité spéciale">
                </form>
            <label for="modify">Modifier un carte</label>
            <input id="modify" type="radio" name="action">
            <br>
                <form action="" method="post">
                    <input type="text" name="nom" placeholder="nom" value="">
                    <input type="textarea" name="description" placeholder="description">
                    <input type="text" name="att" placeholder="Attaque">
                    <input type="text" name="PV" placeholder="Point(s) de vie">
                    <input type="text" name="mana" placeholder="Mana">
                    <input type="text" name="spec" placeholder="Capacité spéciale">
                </form>
            <label for="supp">Supprimer une carte</label>
            <input id="supp" type="radio" name="action">
            <br>
                <form action="" method="post">
                    <input type="text" name="nom" placeholder="nom" value="">
                </form>
            <input type="submit">
       </form>
    </main>
    <footer>

    </footer>
</body>
</html>