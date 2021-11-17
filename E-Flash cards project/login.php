<?php
    $dsn = 'mysql:host=localhost; dbname=e-flash_card_schema';
    $username = 'pma';
    $password = 'W0lver1ne';

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
            header("Location: http://localhost/E-FlashCard/E-Flash cards project/index.php"); 
            exit();
        }
    }      
?>

<script>
    var logtest = <?php echo json_encode($logtest); ?>;
    console.log(logtest);
</script>

<!DOCTYPE html>

<html lang="en" style="background-color: #121212; color:#cccc00;">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Udo's E-Flash Cards</title>
        <link rel="stylesheet" href="css/login-signup-style.css">
        <link rel="stylesheet" href="css/bootstrap.css">
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
                    </div>
                </div>
            </nav>
        </header>

        <div class = "container-fluid">    
            <div class="row"> 
                <div id = "box">
                    <form action="login.php" method="post">
                        <input type="text" id="username" name="username" placeholder="Username"><br>
                        <input type="password" id="password" name="password" placeholder="Password"><br>
                        <input type="submit" value="Login">
                    </form>

                    <p>Don't have an account? <br>
                    <a href="signup.php">Sign up</a> here</p>
                </div>

                
            </div>
        </div>
    
    </body>

</html>