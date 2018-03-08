<?php

class mainControl
{
    public function ShowAll()
    {
        $this->ShowMenu();
        
        $this->ShowEndPage();
    }
    
    public function ShowMenu()
    {
        require_once('./View/menuView.php'); // Chargement Head et Header       
    }
    
    public function ShowEndPage()
    {
         require_once('./View/endpageView.php'); // fermeture html
    }
}