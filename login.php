<?php
    ob_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>MasterCook</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="css/style.css">
        <script src="https://kit.fontawesome.com/e853b470a5.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!------------------- NAV --------------------------->
        <header class="head">
            <div class="nav">
            <?php require('main_nav.php'); ?>
            </div>
        </header>

        <!-- Główna część strony ---------------------------------->
        <div class="padding-top background">
                    <div class="add_user">
                        <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <section>
                                <h2>Zaloguj się</h2>
                                <input type="text" id="login" name="login" placeholder="Login..">
                                <input type="password" id="password" name="password" placeholder="Hasło..">
                            </section>
                            <input type="submit" id="log-in" name="log-in" value="Zaloguj się">
                        </form>
                        <?php
                            include('dbconnect.php');
                            
                            if (isset($_POST['log-in']))
                            {
                                $user = strip_tags($_POST['login']);
                                $pass = password_hash($_POST['password']);


                                // $statement = $mysqli->prepare('INSERT przepisy (nazwa, kategoria, skladniki, wykonanie, zdjecie, czas, trudnosc, data_dodania) VALUES (?,?,?,?,?,?,?, CURDATE())');
                                // $statement->bind_param('sssssis', $nazwa, $kategoria, $skladniki, $wykonanie, $zdjecie, $czas, $trudnosc);
                                // $statement->execute();
                                // $statement->close();

                                header('Location:index.php');
                            }
                        ?>
                    </div>
        </div>
        
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
        <script src="js/skrypty.js"></script>
    </body>
</html>