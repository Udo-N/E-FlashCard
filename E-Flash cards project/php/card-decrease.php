<?php
    session_start();
    $card_number = $_POST['card_number'];
    $_SESSION['Card_number'] = $card_number - 1
?>