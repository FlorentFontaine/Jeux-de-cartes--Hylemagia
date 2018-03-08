<?php


class cardModal
{
    private $pdo;
    
    public function __construct($instance)
    {
         $this->pdo = $instance;
    }
    
   public function getAllCards()
   {
        try
        {                        
            if(($resource = $this->pdo->query('SELECT * FROM card'))!==FALSE)
            {
                if(($data = $resource->fetchAll(PDO::FETCH_ASSOC))!==FALSE)
                {
                    $nain=[];
                   foreach($data as $nainComplet)
                   {
                     $nain[$nainComplet["crd_id"]] = $nainComplet;
                   }
                   
                   return $nain;
                }
            }
        }
        catch(PDOException $msg)
        {
            die($msg->getMessage());
        } 
   }
   
   public function getCardByName($name)
   {
        try
        {                        
            if(($resource = $this->pdo->prepare('SELECT * FROM card INNER JOIN image ON card.img_id = image.img_id   WHERE crd_name =:name'))!==FALSE)
            {              
                if($resource->execute(array("name"=>$name)))
                {
                    if(($data = $resource->fetch())!==FALSE)
                    {
                        return $data;
                    }
                }
            }
            
            return false;
        }
        catch(PDOException $msg)
        {
            die($msg->getMessage());
        }
   }
   
   public function UpdateImage($newText , $img_id)
   {
                            
         
      if(($resource = $this->pdo->prepare('UPDATE image SET img_src=:img_src WHERE img_id=:ref'))!==FALSE)
        {
            if($resource->execute(array("img_src"=>$newText,"ref"=>$img_id)))
            {
               return true;
            }                
        }
        
        return false;
      
    
   }
   
   public function ModifCard($ref , $name ,  $descrip , $manas , $life , $attack)
   {
        if(($resource = $this->pdo->prepare('UPDATE card SET crd_name = :name , crd_decrip = :decrip , crd_manas = :manas , crd_hp = :hp , crd_attack =:attak WHERE crd_name = :ref'))!==FALSE)
        {
            if($resource->execute(array("name"=>$name,"decrip"=>$descrip,"manas"=>$manas,"hp"=>$life,"attak"=>$attack,"ref"=>$ref)))
            {
               return true;
            }                
        }
        
        return false;
   }
   
   public function cardExists($card_name)
   {
        try
        {                        
            if(($resource = $this->pdo->prepare('SELECT * FROM card WHERE crd_name =:name'))!==FALSE)
            {              
                if($resource->execute(array("name"=>$card_name)))
                {
                    if(($data = $resource->fetch())!==FALSE)
                    {
                        if(!is_null($data))
                        {
                          return true;   
                        }
                    }
                }
            }
            
            return false;
        }
        catch(PDOException $msg)
        {
            die($msg->getMessage());
        }
   }
}