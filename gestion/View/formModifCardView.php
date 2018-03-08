
    <div class="formModifContainer">
        <h3>Modfiez : <?php echo $card['crd_name']; ?></h3>
        
        <form method="post" action="?c=card&ref=<?php echo $card['crd_name']; ?>">
            <input type="text" name="crd_name" placeholder="Name" value="<?php echo $card['crd_name']; ?>"><hr>
            <textarea name="crd_decrip" rows="15" cols="35"><?php echo $card['crd_decrip']; ?></textarea><hr>
            <label for="manas">Manas</label><br>
            <input type="number" name="crd_manas" id="manas" value="<?php echo $card['crd_manas']; ?>"><hr>
            <label for="hp">Life</label><br>
            <input type="number" name="crd_hp" id="hp" value="<?php echo $card['crd_hp']; ?>"><hr>
            <label for="attack">Attack</label><br>
            <input type="number" name="crd_attack" id="attack" value="<?php echo $card['crd_attack']; ?>"><hr>
            <input type="number" name="crd_attack" id="attack" value="<?php echo $card['crd_attack']; ?>"><hr>
            <input type="submit" value="Valider">
        </form>
    </div>
