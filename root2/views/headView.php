<?php

$css=null;

    if(isset(SRequest::getInstance()->get()['c']))
    {
        $css = SRequest::getInstance()->get()['c'];
    }
    else
    {
        $css = "user";
    }

?>

<!DOCTYPE html>

<html lang="en">
<head>
   <title>Hylemagia</title>
   <meta type="description" content="">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="style/menu.css" />
   <link rel="stylesheet" type="text/css" href="style/<?php echo $css; ?>.css" />
   <link rel="icon" href="" type="image/x-icon">
</head>

<body>
