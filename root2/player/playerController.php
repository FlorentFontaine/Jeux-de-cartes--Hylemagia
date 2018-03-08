<?php
/**
 * Created by PhpStorm.
 * User: webuser
 * Date: 21/02/2018
 * Time: 09:52
 */
class playerController{

    private $model;
    private $deckmodel;
    private $deck;

    public function __construct()
    {
       // var_dump(SRequest::getInstance()->session()['user']);
        $this->model = new playerModel;
        $this->deckmodel = new deckModel;
    }
    
    public function ShowHeadCom()
    {
         $this->showHead();
        $this->showMenu();
    }

    public function ShowMain()
    {
        //if (isset())
        $decks=$this->deckmodel->getUserDecks(SRequest::getInstance()->session()['user']->getUserId());
        
        include ('playerView.php');
        $this->showFoot();
    }

    public function createAction($params){
        $user_id = SRequest::getInstance()->session()['user']->getUserId();
        $deck_id = SRequest::getInstance()->post()["deck"];
        
        if( !is_null($deck_id) AND is_numeric($deck_id))
        {
            if($this->deckmodel->validDeck($user_id, $deck_id))
            {                
                    $this->deck = new deckModel();                    
                    $this->showDeck($this->deck->selectDeckCards($deck_id) , $deck_id);                
            }
        }
    }
    
    public function insertPlayerAction()
    {
        $user_id = SRequest::getInstance()->session()['user']->getUserId();
        $deck_id = SRequest::getInstance()->post()["deck"];
        $lastPLayerId=$this->model->getLastPlayerId($user_id);
        if($lastPLayerId!==false)
        {
            $notWaiting = $this->model->imNotWaiting($lastPLayerId);
            if($notWaiting)
            {
                if($this->model->createPlayer($user_id, $deck_id)!==false)
               {
                   header('Location: ?c=game');
                  exit;
                }
           }
           else
           {
                header('Location: ?c=game');
                exit;
           }
        }
        else
        {
            echo "problm";
        }
        
        
       
        
    }
    
    public function showDeck($deck , $dck_id)
    {
        include( 'playerViewDeck.php' );
    }

    public function showMenu()
    {
        include( 'views/menuView.php' );
    }

    public function showHead()
    {
        include( 'views/headView.php' );
    }

    public function showFoot()
    {
        include( 'views/footerView.php' );
    }
}