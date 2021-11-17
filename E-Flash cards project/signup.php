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
                    <form>
                        <input type="text" id="username" name="username" placeholder="Username"><br>
                        <input type="password" id="password" name="password" placeholder="Password"><br>
                        <input type="password" id="password2" name="password" placeholder="Re-enter Password"><br>
                        <input type="submit" value="Sign up">
                    </form>

                    <p>Already have an account? <br>
                    <a href="login.php">Login</a> here</p>
                </div>

                
            </div>
        </div>
    
    </body>

</html>