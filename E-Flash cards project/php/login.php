<?php
    $dsn = 'mysql:host=localhost; dbname=e-flash_card_schema';
    $username = 'pma';
    $password = 'Passw0rd69.';

    $db = new PDO($dsn, $username, $password);
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query1 = "SELECT Username FROM `e-flash_card_schema`.`users` WHERE Username = '$username'";
    $statement1 = $db->prepare($query1);
    $statement1->execute();
    $record_username = $statement1->fetch();
    $statement1->closeCursor();

    if ($record_username){
        $query2 = "SELECT Password FROM `e-flash_card_schema`.`users` WHERE Username = '$username'";
        $statement2 = $db->prepare($query2);
        $statement2->execute();
        $record_password = $statement2->fetch();
        $statement2->closeCursor();

        if ($password == $record_password['Password']){
            session_start();
            $_SESSION['Username'] = $username;
            $_SESSION['Card_number'] = 1;
            header("Location: ../index.php"); 
            exit();
        }
        else{
            header("Location: ../invalid-password-login.html");
        } 
    }
    else{
        header("Location: ../invalid-user-login.html");
    }   
      
?>