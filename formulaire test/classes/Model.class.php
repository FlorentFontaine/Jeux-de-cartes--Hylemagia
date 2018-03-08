<?php
/**
 * Created by PhpStorm.
 * User: sxt
 * Date: 24/01/2018
 * Time: 10:39
 */

class Model {
    protected $pdo;

    /**
     * Model constructor.
     */
    public function __construct() {
        try {
            $this->pdo = new PDO( 'mysql:host=localhost;dbname=hylemagia;charset=utf8', 'root', '' );
        } catch( PDOException $e ) {
            die( $e->getMessage() );
        }
    }
}