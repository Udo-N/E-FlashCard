
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
                    
                    <div class="login-signup">
                        <a class="login" href="login.php">Log in</a>
                        <a class="signup" href="signup.php">Sign up</a>
                    </div>

                    <div id="item-list" class="collapse navbar-collapse">
                        <ul id="nav-list" class="nav navbar-nav navbar-right visible-xs navbar-static-top">
                            <li id="phone-login"><a href="login.php">Login</a></li>
          				    <li id="phone-signup"><a href="signup.php">Sign Up</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class = "container-fluid">    
            <div class="row"> 

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
                <button type="button" class="save-button col-lg-1 col-md-1 col-sm-3 col-xs-5">SAVE</button>
            </div>
        </div>
        
        <script src="js/jquery-2.1.4.min.js"></script>
  	    <script src="js/bootstrap.min.js"></script>
  	    <script src="js/script.js"></script>
    </body>

</html>