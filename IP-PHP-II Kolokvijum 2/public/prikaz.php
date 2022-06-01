<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    if($_SESSION['klijent'] != "") {
        $client = $_SESSION['klijent'];
    
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
    Ulogovani ste kao <?= $client ?> <br>
    <a href="../client/?action=logout">Logout</a>
    
</body>
</html>
<?php
} else {
    header('Location: ../index.php');
} 
?>