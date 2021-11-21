<?php
    $dsn = 'mysql:host=localhost; dbname=e-flash_card_schema';
    $username = 'pma';
    $password = 'Passw0rd69.';

    $db = new PDO($dsn, $username, $password);

    session_start();
    $user = @$_SESSION['Username'];
    $card_number = @$_SESSION['Card_number'];

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

    error_reporting(0);
?>

<!DOCTYPE html>

<html lang="en" style="background-color: #121212; color:#cccc00;">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Udo's E-Flash Cards</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/index-style.css">        
    </head>

    <body style="background-color:#121212;">
        <header>
            <nav id="top-nav" class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <div class="navbar-brand">
                            <a href="index.php">
                                <img class= "img1" src="images/Logo.png"/>
                            </a>
                        </div>

                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#item-list" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    
                    <div id="right-header">
                        <a class="login" href="login.html">Log in</a>
                        <a class="signup" href="signup.html">Sign up</a>
                    </div>

                    <div id="item-list" class="collapse navbar-collapse">
                        <ul id="nav-list" class="nav navbar-nav navbar-right visible-xs navbar-static-top">
                            <li id="phone-login"><a href="login.html">Login</a></li>
          				    <li id="phone-signup"><a href="signup.html">Sign Up</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class = "container-fluid">    
            <div id = "main" class="row"> 

                <button class="left-arrow">&#8249;</button>

                <div id = "front">
                    FLASHCARD TEXT
                </div>

                <div id = "back">
                    BACKSIDE
                </div>

                <button class="right-arrow">&#8250;</button>

                <div class="arrows-mobile">
                    <button class="left-arrow-mobile">&#8249;</button>
                    <button class="right-arrow-mobile">&#8250;</button>
                </div>

                <button type="button" class="edit-button col-lg-1 col-md-1 col-sm-3 col-xs-5">EDIT</button>
                <button type="button" id="save-button" class="save-button col-lg-1 col-md-1 col-sm-3 col-xs-5">SAVE</button>
            </div>            
        </div>
        
        <script src="js/jquery-2.1.4.min.js"></script>
  	    <script src="js/bootstrap.min.js"></script>
    </body>

</html>

<script>
    const front_display = document.getElementById("front");
    const back_display = document.getElementById("back");
    const edit_button = document.querySelector(".edit-button");
    const save_button = document.querySelector(".save-button");
    const front_text = document.getElementById("front");
    const back_text = document.getElementById("back");
    const next = document.querySelector(".right-arrow");
    const previous = document.querySelector(".left-arrow");
    const nextMobile = document.querySelector(".right-arrow-mobile");
    const previousMobile = document.querySelector(".left-arrow-mobile");
    var cardNumber = <?php echo json_encode($card_number); ?>;
    var frontText = <?php echo json_encode($front_text); ?>;
    var backText = <?php echo json_encode($back_text); ?>;
    var currentUser = <?php echo json_encode($user); ?>;
    console.log(cardNumber)

    console.log(currentUser);

    if(currentUser != null){
        document.getElementById("right-header").innerHTML = "<div id='current-user'>Logged in as " + currentUser + "</div>";
        document.getElementById("right-header").innerHTML += "<button id= 'signout'>Sign Out</button>";

        document.getElementById("nav-list").innerHTML = "<li>Logged in as " + currentUser + "</li>";
        document.getElementById("nav-list").innerHTML += "<li id='phone-signout'><button>Sign Out</button></li>";

    }

    if(!frontText || frontText.Front_Text == null){
        front_display.innerHTML = "Click Edit to add text to the front of the flashcard. Click flashcard to flip over"
    }
    else{
        front_display.innerHTML = frontText.Front_Text;
    }

    if(!backText || backText.Back_Text == null){
        back_display.innerHTML = "Click Edit to add text to the back of the flashcard. Click flashcard to flip over"
    }
    else{
        back_display.innerHTML = backText.Back_Text;
    }

    if (currentUser == null){
        front_display.innerHTML = "Please Log in or Sign up to save flashcards"
        back_display.innerHTML = "Please Log in or Sign up to save flashcards"
    }

    document.addEventListener("DOMContentLoaded", () => {
        const signOut = document.getElementById("signout");
        const phoneSignOut = document.getElementById("phone-signout");

        if (cardNumber == 1){
            previous.style.display = "none";
        }
        else if (cardNumber == 10){
            next.style.display = "none";
        }
        
        edit_button.addEventListener("click", () => {
            front_text.contentEditable = true;
            back_text.contentEditable = true;
            front_text.style.backgroundColor = "#e6e600";
            front_text.style.color = "#121212";
            back_text.style.backgroundColor = "#e6e600";
            back_text.style.color = "#121212";
        });

        save_button.addEventListener("click", () => {
            
            console.log(String(front_text.innerHTML).length);
            
            if(String(front_text.innerHTML).length > 200 || String(back_text.innerHTML).length > 200){
                if(!document.getElementById("char-warning")){
                    var charWarning = "<div id='char-warning'>Flashcard text must be 200 characters or less<div>";
                    document.getElementById("main").insertAdjacentHTML("afterbegin", charWarning);
                }
            }
            else{
                front_text.contentEditable = false;
                back_text.contentEditable = false;
                front_text.style.backgroundColor = "#121212";
                front_text.style.color = "#e6e600";
                back_text.style.backgroundColor = "#121212";
                back_text.style.color = "#e6e600";
                if(currentUser != null){
                    $.ajax({
                    method: "POST",
                    url: "./php/save.php",
                    data: { 
                        front_display: front_text.innerHTML,
                        back_display: back_text.innerHTML,
                        card_number: cardNumber}
                    }).success(function( msg ) {
                    console.log(msg);
                    });
                }
                else{
                    location.href = ("signup.html")
                }
            }
            
        });

        front_text.addEventListener("click", () => {
            if (!front_text.isContentEditable){
                front_text.style.display = "none";
                back_text.style.display = "flex";
            }
        });

        back_text.addEventListener("click", () => {
            if (!back_text.isContentEditable){
                front_text.style.display = "flex";
                back_text.style.display = "none";
            }
        });

        next.addEventListener("click", () =>{
            console.log(cardNumber)

            $.ajax({
                method: "POST",
                url: "php/card-increase.php",
                data: { card_number: cardNumber}
            }).success(function( msg ) {
                console.log(msg);
                location.href = "index.php"
            });
        });

        previous.addEventListener("click", () =>{
            console.log(cardNumber)
            
            $.ajax({
                method: "POST",
                url: "php/card-decrease.php",
                data: { card_number: cardNumber}
            }).success(function( msg ) {
                console.log(msg);
                location.href = "index.php"
            }); 
            
        });

        nextMobile.addEventListener("click", () =>{
            console.log(cardNumber)

            $.ajax({
                method: "POST",
                url: "php/card-increase.php",
                data: { card_number: cardNumber}
            }).success(function( msg ) {
                console.log(msg);
                location.href = "index.php"
            });
        });

        previousMobile.addEventListener("click", () =>{
            console.log(cardNumber)
            
            $.ajax({
                method: "POST",
                url: "php/card-decrease.php",
                data: { card_number: cardNumber}
            }).success(function( msg ) {
                console.log(msg);
                location.href = "index.php"
            }); 
            
        });

        if(currentUser != null){
            signOut.addEventListener("click", () =>{
                location.href = "php/end-session.php"
            });

            phoneSignOut.addEventListener("click", () =>{
                location.href = "php/end-session.php"
            });
        }
    });
</script>