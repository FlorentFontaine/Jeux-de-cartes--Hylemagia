<?php
    if(!defined('PHP_EOL')) // verifie si la constante existe (normalement oui)
    {
        if(strtoupper(substr(PHP_OS, 0, 3))=="WIN")
        {
            define('PHP_EOL', "\r\n"); //saut de ligne windows
        }
        else
        {
            define('PHP_EOL', "\n");//saut de ligne syst unix
        }
    }
    



//cette function extrait des elements d'une base de donnnes et les retournes dans un fichiers .csv
//paramettres d'entree
//      $bdd
//      $array - premiere dimension tab / duxime dim elmements du tab
// retourne TRUE si execute correctement


    try
    {
        $pdo_option = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Permet de traquer les erreurs et exceptions
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_general_ci' ]; // Envoie une commande d'initialisation au serveur de base de donnÃ©es
                        
        $bdd= new PDO ('mysql:host=localhost;dbname=objectif_hylemagia','objectif_hylemag', 'z39n(hsK}!5+' , $pdo_option);
    }
    catch(PDOException $msg)
    {
        die($msg -> getMessage());
    }



function csv_creature($bdd)
{
    $csv = 'name,descrip,manas,attack,life,img_illuste'.PHP_EOL;
    try
    {                        
        if(($resource = $bdd->query('SELECT card.crd_name , card.crd_decrip , card.crd_manas , card.crd_hp , card.crd_attack , image.img_src  FROM card 
                                    INNER JOIN image ON card.img_id = image.img_id 
                                    WHERE card.crd_type = "creature"
                                    OR card.crd_type = "speciale";'
            ))!==FALSE)
        {
            if(($data = $resource->fetchAll(PDO::FETCH_ASSOC))!==FALSE)
            {
               foreach($data as $element)
               {
                $hp=NULL;
                    switch($element['crd_hp'])
                    {
                        case 0:
                            $hp = "aaaaaaaaa";
                            break;
                        case 1:
                            $hp = "aaaaaaaab";
                            break;
                        case 2:
                            $hp = "aaaaaaabb";
                            break;
                        case 3:
                            $hp = "aaaaaabbb";
                            break;
                        case 4:
                            $hp = "aaaaabbbb";
                            break;
                        case 5:
                            $hp = "aaaabbbbb";
                            break;
                        case 6:
                            $hp = "aaabbbbbb";
                            break;
                        case 7:
                            $hp = "aabbbbbbb";
                            break;
                        case 8:
                            $hp = "abbbbbbbb";
                            break;
                        case 9:
                            $hp = "bbbbbbbbb";
                            break;
                    }
                
                 $csv .= ''.$element['crd_name'].',"'. str_replace("*+*", "\",\"",$element['crd_decrip']).'",'.$element['crd_manas'].','.$element['crd_attack'].','.$hp.','.$element['img_src'].''.PHP_EOL;
               }
            }
        }
    }
    catch(PDOException $msg)
    {
        die($msg->getMessage());
    }
    
    $file = fopen('csvs/card_creature.csv', 'w');
    
    if((fwrite($file, mb_convert_encoding($csv, 'Windows-1252', 'auto')))!==FALSE)
    {
        return TRUE;  
    }
    else
    {
        return FALSE;
    }
    
    fclose($file);
}



function csv_bouclier($bdd)
{
    $csv = 'name,titleDescrip,descrip,manas,attack,life,img_illuste'.PHP_EOL;
    try
    {                        
        if(($resource = $bdd->query('SELECT card.crd_name , card.crd_decrip , card.crd_manas , card.crd_hp , card.crd_attack , image.img_src  FROM card 
                                    INNER JOIN image ON card.img_id = image.img_id 
                                    WHERE card.crd_type = "bouclier";'
            ))!==FALSE)
        {
            if(($data = $resource->fetchAll(PDO::FETCH_ASSOC))!==FALSE)
            {
               foreach($data as $element)
               {
                $hp=NULL;
                    switch($element['crd_hp'])
                    {
                        case 0:
                            $hp = "aaaaaaaaa";
                            break;
                        case 1:
                            $hp = "aaaaaaaab";
                            break;
                        case 2:
                            $hp = "aaaaaaabb";
                            break;
                        case 3:
                            $hp = "aaaaaabbb";
                            break;
                        case 4:
                            $hp = "aaaaabbbb";
                            break;
                        case 5:
                            $hp = "aaaabbbbb";
                            break;
                        case 6:
                            $hp = "aaabbbbbb";
                            break;
                        case 7:
                            $hp = "aabbbbbbb";
                            break;
                        case 8:
                            $hp = "abbbbbbbb";
                            break;
                        case 9:
                            $hp = "bbbbbbbbb";
                            break;
                    }
                
                 $csv .= ''.$element['crd_name'].',"'. str_replace("*+*", "\",\"",$element['crd_decrip']).'",'.$element['crd_manas'].','.$element['crd_attack'].','.$hp.','.$element['img_src'].''.PHP_EOL;
               }
            }
        }
    }
    catch(PDOException $msg)
    {
        die($msg->getMessage());
    }
    
    $file = fopen('csvs/card_bouclier.csv', 'w');
    
    if((fwrite($file, mb_convert_encoding($csv, 'Windows-1252', 'auto')))!==FALSE)
    {
        return TRUE;  
    }
    else
    {
        return FALSE;
    }
    
    fclose($file);
}



function csv_sort($bdd)
{
    $csv = 'name,titleDescrip,descrip,manas,attack,life,img_illuste'.PHP_EOL;
    try
    {                        
        if(($resource = $bdd->query('SELECT card.crd_name , card.crd_decrip , card.crd_manas , card.crd_hp , card.crd_attack , image.img_src FROM card 
                                    INNER JOIN image ON card.img_id = image.img_id 
                                    WHERE card.crd_type = "sort";'
            ))!==FALSE)
        {
            if(($data = $resource->fetchAll(PDO::FETCH_ASSOC))!==FALSE)
            {
               foreach($data as $element)
               {
                $hp=NULL;
                    switch($element['crd_hp'])
                    {
                        case 0:
                            $hp = "aaaaaaaaa";
                            break;
                        case 1:
                            $hp = "aaaaaaaab";
                            break;
                        case 2:
                            $hp = "aaaaaaabb";
                            break;
                        case 3:
                            $hp = "aaaaaabbb";
                            break;
                        case 4:
                            $hp = "aaaaabbbb";
                            break;
                        case 5:
                            $hp = "aaaabbbbb";
                            break;
                        case 6:
                            $hp = "aaabbbbbb";
                            break;
                        case 7:
                            $hp = "aabbbbbbb";
                            break;
                        case 8:
                            $hp = "abbbbbbbb";
                            break;
                        case 9:
                            $hp = "bbbbbbbbb";
                            break;
                    }
                
                 $csv .= ''.$element['crd_name'].',"'.str_replace("*+*", "\",\"",$element['crd_decrip']).'",'.$element['crd_manas'].','.$element['crd_attack'].','.$hp.','.$element['img_src'].''.PHP_EOL;
               }
            }
        }
    }
    catch(PDOException $msg)
    {
        die($msg->getMessage());
    }
    
    $file = fopen('csvs/card_sort.csv', 'w');
    
    if((fwrite($file, mb_convert_encoding($csv, 'Windows-1252', 'auto')))!==FALSE)
    {
        return TRUE;  
    }
    else
    {
        return FALSE;
    }
    
    fclose($file);
}

function csv_hero($bdd)
{
    $csv = 'name,@img_illuste'.PHP_EOL;
    try
    {                        
        if(($resource = $bdd->query('SELECT hero.her_nom, image.img_src FROM hero
                                    INNER JOIN image ON hero.img_id = image.img_id;'
            ))!==FALSE)
        {
            if(($data = $resource->fetchAll(PDO::FETCH_ASSOC))!==FALSE)
            {
               foreach($data as $element)
               {
                 $csv .= ''.$element['her_nom'].','.$element['img_src'].''.PHP_EOL;
               }
            }
        }
    }
    catch(PDOException $msg)
    {
        die($msg->getMessage());
    }
    
    $file = fopen('csvs/card_hero.csv', 'w');
    
    if((fwrite($file, mb_convert_encoding($csv, 'Windows-1252', 'auto')))!==FALSE)
    {
        return TRUE;  
    }
    else
    {
        return FALSE;
    }
    
    fclose($file);
}


?>

<p style="text-align: center;">Generation fichier.csv de la db hylemagia</p>
<a href="?exe" style="margin: auto; width: 200px; margin-top: 5px; height: 50px; background-color: #eee; line-height: 50px; text-align: center; color: #333; font-size: 20px; display: block;">CSV creatures</a>
<a href="?exe2" style="margin: auto; width: 200px; margin-top: 5px; height: 50px; background-color: #eee; line-height: 50px; text-align: center; color: #333; font-size: 20px; display: block;">CSV sorts</a>
<a href="?exe3" style="margin: auto; width: 200px; margin-top: 5px; height: 50px; background-color: #eee; line-height: 50px; text-align: center; color: #333; font-size: 20px; display: block;">CSV hero</a>
<a href="?exe4" style="margin: auto; width: 200px; margin-top: 5px; height: 50px; background-color: #eee; line-height: 50px; text-align: center; color: #333; font-size: 20px; display: block;">CSV Bouclier</a>


<?php
if(isset($_GET['exe']))
{
    if(csv_creature($bdd))
    {
        ?>
        <a href="csvs/card_creature.csv" style="margin: auto; width: 200px; height: 50px; background-color: lightgreen; line-height: 50px; text-align: center; color: #333; font-size: 20px; display: block; margin-top: 5px;" download>Telecharger creature</a>
        <?php
    }
    else
    {
        echo "erreur";
    }
}
elseif(isset($_GET['exe2']))
{
        if(csv_sort($bdd))
    {
        ?>
        <a href="csvs/card_sort.csv" style="margin: auto; width: 200px; height: 50px; background-color: lightgreen; line-height: 50px; text-align: center; color: #333; font-size: 20px; display: block; margin-top: 5px;" download>Telecharger sort</a>
        <?php
    }
    else
    {
        echo "erreur";
    }
}
elseif(isset($_GET['exe3']))
{
        if(csv_hero($bdd))
    {
        ?>
        <a href="csvs/card_hero.csv" style="margin: auto; width: 200px; height: 50px; background-color: lightgreen; line-height: 50px; text-align: center; color: #333; font-size: 20px; display: block; margin-top: 5px;" download>Telecharger hero</a>
        <?php
    }
    else
    {
        echo "erreur";
    }
}
elseif(isset($_GET['exe4']))
{
        if(csv_bouclier($bdd))
    {
        ?>
        <a href="csvs/card_bouclier.csv" style="margin: auto; width: 200px; height: 50px; background-color: lightgreen; line-height: 50px; text-align: center; color: #333; font-size: 20px; display: block; margin-top: 5px;" download>Telecharger bouclier</a>
        <?php
    }
    else
    {
        echo "erreur";
    }
}
?>
