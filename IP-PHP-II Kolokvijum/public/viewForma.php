<?php
    require_once 'DAOStudent.php';
    $msg = isset($msg)?$msg:""; 
    $dao = new DAOStudent();
    $students = $dao->selectAllStudents();
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
<?= $msg ?>

<form action="" method="POST">
    ID: <br>
    <input type="text" name="id"> <br><br>
    IME: <br>
    <input type="text" name="ime"> <br><br>
    PREZIME: <br>
    <input type="text" name="prezime"> <br><br>
    INDEKS: <br>
    <input type="text" name="indeks"> <br><br>
    <div style="display: flex;">
        <input type="submit" name="action" value="Update"> &nbsp; &nbsp;
        <input type="submit" name="action" value="Insert"> &nbsp; &nbsp;
        <input type="submit" name="action" value="Delete"> 
    </div>
    <br> <br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>IME</th>
            <th>PREZIME</th>
            <th>INDEKS</th>
        </tr>
        <?php foreach((array)$students as $student) { ?>

            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= $student['ime'] ?></td>
                <td><?= $student['prezime'] ?></td>
                <td><?= $student['brIndexa'] ?></td>
                
            </tr>
        <?php } ?>

    </table>
</form>
</body>
</html>