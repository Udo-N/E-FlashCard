<?php
    $dsn = 'mysql:host=localhost; dbname=e-flash_card_schema';
    $username = 'pma';
    $password = 'Passw0rd69.';

    $db = new PDO($dsn, $username, $password);
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $query1 = "SELECT Username FROM `e-flash_card_schema`.`users` WHERE Username = '$username'";
    $statement1 = $db->prepare($query1);
    $statement1->execute();
    $record_username = $statement1->fetch();
    $statement1->closeCursor();

    if (!$record_username){
        if($password == $password2){
            $query2 = "INSERT INTO `e-flash_card_schema`.`users` 
                        VALUES ('$username', '$password')";
            $statement2 = $db->prepare($query2);
            $statement2->execute();

            $query3 = "INSERT INTO `e-flash_card_schema`.`card_text` (Username, Card_Number)
                        VALUES ('$username', 1), ('$username', 2) ";
            $statement3 = $db->prepare($query3);
            $statement3->execute();
            header("Location: ../login.html"); 
            exit();
        }
        else{
            //TODO: Send back a value that makes signup.html display that passwords don't match
            header("Location: ../pass-mismatch-signup.html");
        }
    }
    else{
        //TODO: Send back a value that makes signup.html display that username is taken
        header("Location: ../user-taken-signup.html");
    }      
?>
