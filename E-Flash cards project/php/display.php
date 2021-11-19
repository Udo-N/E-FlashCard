<?php
    $dsn = 'mysql:host=localhost; dbname=e-flash_card_schema';
    $username = 'pma';
    $password = 'Passw0rd69.';

    $db = new PDO($dsn, $username, $password);

    session_start();
    $user = $_SESSION['Username'];
    $card_number = 1;

    $query1 = "SELECT Front_Text FROM `e-flash_card_schema`.`card_text` WHERE Username = '$user' AND Card_Number = '$card_number'";
    $statement1 = $db->prepare($query1);
    $statement1->execute();
    $front_text = $statement1->fetch();
    $statement1->closeCursor();

    $query2 = "SELECT Back_Text FROM `e-flash_card_schema`.`card_text` WHERE Username = '$user' AND Card_Number = '$card_number'";
    $statement2 = $db->prepare($query2);
    $statement2->execute();
    $back_text = $statement2->fetch();
    $statement2->closeCursor();

?>

<script>
    const front_display = document.getElementById("front");
    const back_display = document.getElementById("back");
    var frontText = <?php echo json_encode($front_text); ?>;
    var backText = <?php echo json_encode($back_text); ?>;

    front_display.innerHTML = frontText;
    back_display.innerHTML = backText;

    //TODO: if frontTEXT and backText are empty, display default text values
</script>