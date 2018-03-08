<?php

class cardControl
{
    private $modal;
    
    public function __construct($pdo)
    {
        $this->modal = new cardModal($pdo);
    }

    public function ShowAll()
    {
        $this->ShowMenu();
    }
    
    public function ShowAllGood()
    {
        require_once('./View/goodExecuteView.php');
    }
    
    public function ModifAct($ref ,$name ,  $descrip , $manas , $life , $attack)
    {
        if($this->modal->ModifCard($ref , $name ,  $descrip , $manas , $life , $attack))
        {
            return true;
        }
        
        return false;
    }
    
    public function showChangeImageList($cards)
    {
        require_once('./View/ChangeImageListView.php'); 
    }
    
    public function showChangeImage($card)
    {
        require_once('./View/ChangeImageView.php'); 
    }
    
    public function UpateImgAct($text , $img_id)
    {
        if($this->modal->UpdateImage($text , $img_id))
        {
            return true;
        }
        
        return false;
    }
    
    public function ShowMenu()
    {
        require_once('./View/menuView.php'); // Chargement Head et Header       
    }
    
    public function ShowEndPage()
    {
        require_once('./View/endpageView.php'); // fermeture html
    }
    
    public function ShowModifForm($card)
    {
        require_once('./View/formModifCardView.php');
    }
    
    public function ShowChooseCard($cards)
    {
        require_once('./View/cardChooseOneView.php');
    }
    
    public function getModal()
    {
        return $this->modal;
    }
    
    public function cardExists($card_name)
    {
        if($this->modal->cardExists($card_name))
        {
            return true;
        }
        
        return false;
    }
}