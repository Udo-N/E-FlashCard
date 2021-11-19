
<?php
    $dsn = 'mysql:host=localhost; dbname=e-flash_card_schema';
    $username = 'pma';
    $password = 'Passw0rd69.';

    $db = new PDO($dsn, $username, $password);
    
    session_start();
    $user = $_SESSION['Username'];

    $front_text = $_POST['front_display'];
    $back_text = $_POST['back_display'];
    // $card_number = 1
    // $updated_card_number = $card_number + 1;

    $query = "UPDATE `e-flash_card_schema`.`card_text`
                SET Front_text = '$front_text',
                    Back_Text = '$back_text', 
                    Card_Number = 1
                WHERE Username = '$user'";
    $statement = $db->prepare($query);
    $statement->execute();
?>
