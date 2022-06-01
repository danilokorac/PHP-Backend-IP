<?php

    $msg = isset($msg)?$msg:"";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="" method="post">
        User: <br>
        <input type="text" name="user"> <br>
        Pass: <br>
        <input type="password" name="pass"> <br> 
        <i style="color: red"><?= $msg ?></i>  <br>
        <input type="submit" name="action" value="login"> 
    </form>
</body>
</html>