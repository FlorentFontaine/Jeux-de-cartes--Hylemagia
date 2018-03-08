<?php

class gameController
{
    
    private $model;
    private $classGame;

    
    public function __construct()
    {
        $this->model = new gameModel;
        $game_id = $this->model->getMyGameId($this->model->lastPLayFromUser(SRequest::getInstance()->session()['user']->getUserId())["pla_id"]);
        $this->classGame =  new Game($game_id);
       // var_dump($game_id);
                              
            if($this->model->gameIsFull($game_id["gam_id"]))
            {
                $this->classGame->setPlayer1($game_id["pla_id"]);
                $this->classGame->setPlayer2($game_id["pla_id_PLAYER"]);
                
                    $modelDeck = new deckModel();
                    
                    $obj_complt_deck = new Deck();                    
                    $deckId = $this->getPlayerDeck($game_id["pla_id"]);
                    $deck_info = $this->model->getDeckInfo($deckId);   
                    $obj_complt_deck->setId($deck_info[0]["dck_id"]);
                    $obj_complt_deck->setDate($deck_info[0]["maked_deck_date"]);
                    $obj_complt_deck->setName($deck_info[0]["dck_name"]);
                    $obj_complt_deck->setUniv($deck_info[0]["univ_id"]);
                    $obj_complt_deck->setUser($deck_info[0]["user_id"]);                    
                    $cards = $modelDeck->selectDeckCards($deck_info[0]["dck_id"]);
                    $obj_complt_deck->setDeckCards($cards);
                        $this->classGame->setDeck1($obj_complt_deck);
                
                
                    $obj_complt_deck2 = new Deck();                    
                    $deckId = $this->getPlayerDeck($game_id["pla_id_PLAYER"]);
                    $deck_info = $this->model->getDeckInfo($deckId);  
                    $obj_complt_deck2->setId($deck_info[0]["dck_id"]);
                    $obj_complt_deck2->setDate($deck_info[0]["maked_deck_date"]);
                    $obj_complt_deck2->setName($deck_info[0]["dck_name"]);
                    $obj_complt_deck2->setUniv($deck_info[0]["univ_id"]);
                    $obj_complt_deck2->setUser($deck_info[0]["user_id"]);                    
                    $cards = $modelDeck->selectDeckCards($deck_info[0]["dck_id"]);
                    $obj_complt_deck2->setDeckCards($cards);
                        $this->classGame->setDeck2($obj_complt_deck2);
                
                
               if($this->classGame->getPlayer2()!=NULL AND $this->classGame->getPlayer1()!=NULL)
               {
                    $this->showPlatView($this->classGame);
               }
               
            }
            else
            {
                $waiting = $this->model->isWaiting();
                if(!$waiting)
                {
                    // CREATE
                    
                    $this->classGame->setPlayer1($this->model->lastPLayFromUser(SRequest::getInstance()->session()['user']->getUserId())["pla_id"]) ;    
                    if(!is_null($this->classGame->getPlayer1()) )
                    {
                            if($this->model->createGame($this->classGame->getPlayer1())) // GAME COMPLET
                            {                       
                                    $this->showRedirectUpdate();  
                            } 
                            
                       
                    }
                }
                elseif(is_array($waiting))
                {
                    $playerIsNotMe = $this->model->playerIsNotMe($this->model->isWaiting()['gam_id'], SRequest::getInstance()->session()['user']->getUserId());
                    
                    if(!is_array($playerIsNotMe))
                    {
                        // UPDATE
                         $this->classGame->setPlayer1($this->model->isWaiting()["pla_id"]);
                         $this->classGame->setPlayer2($this->model->lastPLayFromUser(SRequest::getInstance()->session()['user']->getUserId())["pla_id"]) ;                
                        
                            if(!is_null($this->classGame->getPlayer1()) AND !is_null($this->classGame->getPlayer2()))
                            {
                                if($this->model->updateGame($this->classGame->getPlayer2() , $this->model->isWaiting()['gam_id'])) // GAME COMPLET
                                {
                                     $this->showRedirect();          
                                }                        
                            }
                    }
                }     
            }
    }
    
    public function getPlayerDeck($pla_id)
    {
        return $this->model->playerDeck($pla_id);
    }
    
    public function showRedirectUpdate()
    {
        include( 'game/loadingGameView.php' );
    }
    
    public function showRedirect()
    {
        include( 'game/redirView.php' );
    }
    
    public function showPlatView($ob_game)
    {
        include( 'game/platView.php' );
    }
    
    public function ShowHeadCom()
    {
        
        
        if($this->classGame->getPlayer2()==NULL)
        {
            $this->showHead();
           $this->showMenu(); 
        }
        
    }
    
    public function ShowMain()
    {
        
        if(is_null($this->classGame->getPlayer2()))
        {
            $this->showRedirectUpdate();
        }
        
            $this->showFoot();
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