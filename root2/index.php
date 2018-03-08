<?php

require_once ( "Common.php");
require_once( 'vendor/SPDO.php' );
require_once ("ini.php");
require_once("vendor/SRequest.php");


if(!is_null(SRequest::getInstance()->get()))
    $get = SRequest::getInstance()->get();
if(!is_null(SRequest::getInstance()->post()))
    $post = SRequest::getInstance()->post();
if(isset($get['decon']))
{
    //session_destroy();
    SRequest::getInstance()->unsetSession();
    unset($_SESSION['user']);
    header('Location: index.php');
    exit;
}


if (isset($get['c'])){
    $controlleur = strtolower($get['c']) . "Controller.php";
    $controlName =  $get['c'] . "Controller";
    $dosAct = $get['c'];
}else {
    $controlleur = "userController.php";
    $controlName="userController";
    $dosAct = "user";
}

$FilePath = "./".$dosAct."/".$controlleur;

if(file_exists($FilePath)) {


        $control = new $controlName;
        $control->ShowHeadCom();


        if(isset($get['a'])){
            $method = $get['a'] . "Action";

            if(method_exists($control , $method))
            {
                $params = null;
                if(isset($post))
                {
                    $params = $post;
                }
                elseif(isset($get))
                {
                    $params = $get;
                }

                $control->$method($params);

                if($method == "connectAction")
                {
                    ?>
                    <script type="text/javascript">
                        window.location.href = "index.php";
                    </script>
                    <?php
                }
            }
            else
                {
                echo "Methode demande non execute";
            }
        }
    $control->ShowMain();
}else{
    Header("Location: 404");
}



