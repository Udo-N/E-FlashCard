<?php
    $dsn = 'mysql:host=localhost; dbname=e-flash_card_schema';
    $username = 'pma';
    $password = 'Passw0rd69.';

    $db = new PDO($dsn, $username, $password);
    
    session_start();
    $user = $_SESSION['Username'];

    $front_text = $_POST['front_display'];
    $back_text = $_POST['back_display'];
    $card_number = $_POST['card_number'];

    $query = "SELECT Card_Number FROM `e-flash_card_schema`.`card_text`
                WHERE Username = '$user'";
    $statement = $db->prepare($query);
    $statement->execute();
    $card_number_array = $statement->fetchAll();
    $statement->closeCursor();
    $no_of_cards = count($card_number_array);

    if($card_number <= $no_of_cards){
        $query = "UPDATE `e-flash_card_schema`.`card_text`
                    SET Front_text = '$front_text',
                        Back_Text = '$back_text' 
                    WHERE Username = '$user' AND Card_Number = '$card_number'";
        $statement = $db->prepare($query);
        $statement->execute();
    }
    else{
        $query = "INSERT INTO `e-flash_card_schema`.`card_text` (Username, Front_text, Back_text, Card_Number)
                    VALUES ('$user','$front_text', '$back_text', '$card_number')";
        $statement = $db->prepare($query);
        $statement->execute();
    }
?>