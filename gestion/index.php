<?php

if(isset($_GET['c']))
{
    $control = $_GET['c'] . "Control";
}
else
{
    $control = "mainControl";
}

if(isset($_GET['c']))
{
    $modal = $_GET['c'] . "Modal";
}
else
{
    $modal = "mainModal";
}


require_once("./param/config.php");

if(file_exists("./Control/".$control.".php"))
{
    require_once("./param/SPDO.php"); //SPDO
    $pdo = SPDO::getInstance(DB_HOST, DB_NAME, DB_USER , DB_PASS)->getPDO();
     
    require_once("./Control/".$control.".php");   // Chargement controlleur
    
    if(file_exists("./Modal/".$modal.".php"))
    {
         require_once("./Modal/".$modal.".php"); //Chargement Modal si il y en a
    }
    
    $control = new $control($pdo);
    $control->ShowAll();
    
    if(!isset($_GET['c']))
    {
        $_GET['c']=null;
    }
    
        switch($_GET['c'])
        {
            case "card":
                if(!isset($_GET['name']) AND !isset($_GET['nameToImg'])) // card sans card name
                {
                    $control->ShowChooseCard($control->getModal()->getAllCards());
                    $control->showChangeImageList($control->getModal()->getAllCards());
                }
                elseif(isset($_GET['name'])) // card avec card name
                {
                    if($control->cardExists($_GET['name']))
                    {
                      $control->ShowModifForm($control->getModal()->getCardByName($_GET['name']));  
                    }
                    else
                    {
                      header('Location: 404');  
                       
                    }
                    
                }
                elseif(isset($_GET['nameToImg']))
                {
                    if(!isset($_GET['nameToImg'])) // card sans card name
                    {
                        $control->ShowChooseCard($control->getModal()->getAllCards());
                        $control->showChangeImageList($control->getModal()->getAllCards());
                    }
                    else // card avec card name
                    {
                        if($control->cardExists($_GET['nameToImg']))
                        {
                          $control->showChangeImage($control->getModal()->getCardByName($_GET['nameToImg']));
                        }
                        else
                        {
                          header('Location: 404');  
                           
                        }
                        
                    }
                }
                
                if(isset($_GET['ref']) AND isset($_POST['crd_name']) AND isset($_POST['crd_decrip']) AND isset($_POST['crd_manas']) AND isset($_POST['crd_hp']) AND isset($_POST['crd_attack']))
                {
                    if($control->ModifAct($_GET['ref'] , $_POST['crd_name'] , $_POST['crd_decrip'] , $_POST['crd_manas'] , $_POST['crd_hp'] , $_POST['crd_attack']))
                    {
                        ?><script type="text/javascript"> {window.location.href = "./?c=card&goodexecute"};</script><?php 
                    }
                    else
                    {
                        echo "Une erreur est survenue, desole";
                    }
                }
                
                if(isset($_GET['ref2']) AND isset($_POST['img_name']) AND isset($_POST['imgId']))
                {
                    if($control->UpateImgAct($_POST['img_name'] , $_POST['imgId']))
                    {
                        ?><script type="text/javascript"> {window.location.href = "./?c=card&goodexecute"};</script><?php 
                    }
                    else
                    {
                        echo "Une erreur est survenue, desole";
                    }
                }
                
                if(isset($_GET['goodexecute']))
                {                    
                        $control->ShowAllGood();
                }
                
                break;
        }
        
    $control->ShowEndPage();
}
else
{
   //header('Location: 404');
}



