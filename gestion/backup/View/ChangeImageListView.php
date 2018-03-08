<main>
 <div class="choosecard">
    <h3>A qui veut tu changer l'image?</h3>
    
    <form action="" method="get">
        <select name="nameToImg">
            <?php
            
            foreach($cards as $card)
            {
                if(!in_array($card['crd_name'] , $tmp))
                {
                    ?><option value="<?php echo $card['crd_name']; ?>"><?php echo $card['crd_name']; ?></option><?php
                }
                $tmp[] = $card['crd_name'];   
            }
            
            ?>
        </select>
        <hr>
        <input type="hidden" name="c" value="card">
        <input type="submit" value="Continuer">
    </form>
    
</div>  