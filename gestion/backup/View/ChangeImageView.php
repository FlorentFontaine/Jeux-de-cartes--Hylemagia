<div class="formModifContainer">
    <h4>Changer l'image de <?php echo $card['crd_name']; ?></h4>
    <p>ANCIEN : <?php echo $card['img_src']; ?></p><br>**Temporel pour CSV<br>
    <form method="post" action="?c=card&ref2=<?php echo $card['crd_name']; ?>">
        <input type="hidden" name="imgId" value="<?php echo  $card['img_id'];?>">
        <input type="text" name="img_name" placeholder="Nom du fichier"><br>
        <input type="submit" value="Changer">
    </form>
</div>

<?php

var_dump($card);