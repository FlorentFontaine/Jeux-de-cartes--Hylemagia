<?php

class GameModel{
     private $pdo;

    public function __construct()
    {
        $this->pdo = SPDO::getInstance()->getDb();
    }
    
    public function getMyGameId($pla_ID)
    {
        if(($resource = $this->pdo->prepare('SELECT * FROM game WHERE pla_id = :pla1id OR pla_id_PLAYER = :pla2id ORDER BY gam_id DESC'))!==FALSE)
        {
            if($resource->execute(["pla1id"=>$pla_ID , "pla2id"=>$pla_ID]))
            {
               if(($game = $resource->fetch(PDO::FETCH_ASSOC))!==FALSE)
                {
                    return( $game);
                }
            }
        }
        
        return false;
    }
    
    public function gameIsFull($gameid)
    {
        if(($resource = $this->pdo->prepare('SELECT * FROM game WHERE gam_id = :gamID'))!==FALSE)
        {
            if($resource->execute(["gamID"=>$gameid]))
            {
               if(($game = $resource->fetch(PDO::FETCH_ASSOC))!==FALSE)
                {                
                    if($game["pla_id_PLAYER"]!=NULL)
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
            }
        }
    }

    
    public function adverseHasArrived($gameid)
    {
        if(($resource = $this->pdo->prepare('SELECT * FROM game WHERE gam_id = :gamID'))!==FALSE)
        {
            if($resource->execute(["gamID"=>$gameid]))
            {
               if(($game = $resource->fetch(PDO::FETCH_ASSOC))!==FALSE)
                {                
                    if($game["pla_id_PLAYER"]!=NULL)
                    {
                        return $game;
                    }
                }
            }
        }
        
        return false;
    }
    
    public function isWaiting()
    {
        if(($resource = $this->pdo->prepare('SELECT * FROM game WHERE pla_id_PLAYER IS NULL LIMIT 1'))!==FALSE)
        {
            if($resource->execute())
            {
               if(($array = $resource->fetch())!==FALSE)
                {
                    if(!is_null($array))
                    {
                        
                        return $array;
                    }
                }
            }            
        }
        
        return false;
    }
    
    public function playerDeck($pla_id)
    {
        if(($resource = $this->pdo->prepare('SELECT deck_id_fk FROM player WHERE pla_id = :id'))!==FALSE)
        {           
                if($resource->execute(["id"=>$pla_id]))
                {
                    if(($array = $resource->fetchAll(PDO::FETCH_ASSOC))!==FALSE)
                    {
                        return $array;       
                    }
                }                
        }
        
        return false;
    }
    
    public function getDeckInfo($deckId)
    {
        if(($resource = $this->pdo->prepare('SELECT * FROM deck WHERE dck_id = :id'))!==FALSE)
        {           
                if($resource->execute(["id"=>$deckId[0]["deck_id_fk"]]))
                {
                    if(($array = $resource->fetchAll(PDO::FETCH_ASSOC))!==FALSE)
                    {
                        return $array;       
                    }
                }                
        }
        
        return false;
    }
    
    public function playerIsNotMe($gameId, $userme)
    {
        if(($resource = $this->pdo->prepare('SELECT pla_id FROM game WHERE gam_id = :gId'))!==FALSE)
        {
            if($resource->execute(["gId"=>$gameId]))
            {
               if(($pla_id = $resource->fetch(PDO::FETCH_ASSOC))!==FALSE)
                {
                    if(!is_null($pla_id))
                    {
                        if(($resource = $this->pdo->prepare('SELECT * FROM player WHERE pla_id = :pId'))!==FALSE)
                        {
                            if($resource->execute(["pId"=>$pla_id["pla_id"]]))
                            {
                                if(($userNotMe = $resource->fetch(PDO::FETCH_ASSOC))!==FALSE)
                                {
                                    if($userNotMe["user_id"]==$userme)
                                    {
                                        return $userNotMe;
                                    }
                                }
                            }
                        }
                    }
                }
            }            
        }
        
        return true;
    }

    public function createGame($id){
         try {
            if ( ( $reponse = $this->pdo->prepare('INSERT INTO game(`pla_id`, `gam_date` ) VALUES(:id, NOW())' )  ) !== false )
            {           
                if( $reponse->execute(array("id"=> $id )))
                {
                    $thisID = $this->pdo->lastInsertId() ;
                    return $thisID;
                }
            }
        }catch( PDOException $e ) {
            die( $e->getMessage( ) );
        }

        return false;
    }
    
    
    public function updateGame($id, $game)
    {        
        if(($resource = $this->pdo->prepare('UPDATE game SET pla_id_PLAYER = :id WHERE gam_id = :gameID'))!==FALSE)
        {
            if( $resource->execute(array("id"=> $id , "gameID"=>$game )))
            {
                return true;
            }
        }
        return false;
    }
    
    public function lastPLayFromUser($user_id)
    {
        if(($resource = $this->pdo->prepare('SELECT * FROM player WHERE user_id = :user ORDER BY pla_id DESC LIMIT 1'))!==FALSE)
        {
            if($resource->execute(array("user"=>$user_id)))
            {
               if(($array = $resource->fetch())!==FALSE)
                {
                    if(!is_null($array))
                    {
                        return $array;
                    }
                }
            }            
        }
        
        return false;
    }
    
}





