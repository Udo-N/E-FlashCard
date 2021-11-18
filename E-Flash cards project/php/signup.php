<?php
    $dsn = 'mysql:host=localhost; dbname=e-flash_card_schema';
    $username = 'pma';
    $password = 'W0lver1ne';

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

            $query3 = "INSERT INTO `e-flash_card_schema`.`card_text` (Username)
                        VALUES ('$username') ";
            $statement3 = $db->prepare($query3);
            $statement3->execute();
            header("Location: http://localhost/E-FlashCard/E-Flash cards project/login.php"); 
            exit();
        }
    }      
?>


<script>
    var logtest = <?php echo json_encode($record_username); ?>;
    console.log(logtest);
</script>