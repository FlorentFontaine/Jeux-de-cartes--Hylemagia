<?php

if(!defined('DB_HOST'))
{
    define('DB_HOST' , "localhost");
}

if(!defined('DB_NAME'))
{
    define('DB_NAME' , "objectif_hylemagia");
}

if(!defined('DB_USER'))
{
    define('DB_USER' , "objectif_hylemag");
}

if(!defined('DB_PASS'))
{
    define('DB_PASS' , "z39n(hsK}!5+");
}




if(!defined( 'DOMAIN' ))
{
    define( 'DOMAIN', ( isset( $_SERVER['REQUEST_SCHEME'] ) ? $_SERVER['REQUEST_SCHEME'] : 'http' ) . '://' . $_SERVER['SERVER_NAME'] . ( !empty( $_SERVER['SERVER_PORT'] ) ? ':' . $_SERVER['SERVER_PORT'] : '' ) . dirname( $_SERVER['PHP_SELF'] ) . '/' );
}

if(!defined( 'THIS_SCRIPT_FOLDER' ))
{
    define('THIS_SCRIPT_FOLDER', basename(dirname( $_SERVER['PHP_SELF'] ))) ;
}
