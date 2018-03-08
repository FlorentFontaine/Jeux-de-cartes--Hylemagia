<?php
require_once( '../classes/Deck.class.php' );
require_once( 'models/DeckModel.class.php' );

class DeckController {
    private $model;

    public function __construct() {
        $this->model = new deckModel;
    }

    public function showDeckAction() {
        $decks = $this->model->selectDeck();
        include( 'views/Deck.php' );
    }

    public function showDeckCards($deck_id)
    {
        $idDeck=$this->model->selectDeckCards($deck_id);
        include( 'views/DeckCards.php' );
    }

    public function createAction($user, $univ, $name , $checkbox){
        $create=$this->model->createDeck($user, $univ, $name);
        $move=$this->model->moveToDeck($create, $checkbox);
    }


}