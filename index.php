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
        <main class="main container-fluid">
            <div class="intro row">
                <div class="intro-text col">
                    <h1><span class="color">MasterCook</span> - Twój przepis na sukces w kuchni!</h1>
                </div>
            </div>
            <?php require('dbconnect.php');
            
                
                $random = $mysqli->query('SELECT * FROM przepisy ORDER BY RAND()');
                $random_recipe = mysqli_fetch_array($random);

                $main = <<< HTML

            <div class="row justify-content-center">
            <div class="recipe_of_the_day col-lg-6 col-sm-12">
                <div class="featured recipe_day">
                    <header class="title-ribbon">
                        <h3 class="ribbon">Przepis dnia!</h3>
                    </header>
                    <article>
                        <figure>
                            <img src="img/$random_recipe[zdjecie]" alt="">
                            <figcaption class="recipe_day_e">
                                <a href="">
                                <i class="fas fa-eye"></i>
                                <span>Zobacz przepis</span>
                                </a>
                            </figcaption>
                        </figure>
                        <div class="description">
                            <h2>$random_recipe[nazwa]</h2>
                            <p>Nie masz pomysłu, a chcesz coś zjeść? Może przygotujemy dzisiaj przepis dnia?</p>
                        </div>
                    </article>
                </div>
            </div>
                    
            <div class="search col-lg-4 col-sm-12">
                <div class="form">
                <h3>Co masz ochotę zjeść?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit reprehenderit iure aut esse odio veritatis architecto, laudantium voluptates dolores saepe sapiente quas eveniet aliquam laboriosam, molestias non pariatur.</p>
                <form action="#">
                    <input type="search" placeholder="Szukaj przepisu..">
                    <br/>
                    <input type="submit" value="Szukaj &#8674;">
                </form>
                </div>
            </div>
            </div>

HTML;
echo $main;
            ?>
            
        </main>
        <!-- Kategorie ----------------------------------------->
        <article class="background">
            <section class="main-section container-fluid">
                <div class="category row justify-content-around">
                    <div class="col-10">
                        <nav class="category-nav">
                        <?php require('nav_category.php'); ?>
                        </nav>
                    </div>
                </div>
            </section>

            <!-- Ostatnio dodane ---------------------------------------------- -->
            <section class="latest container-fluid">
                <header class="title-ribbon">
                    <h3 class="ribbon-top">Ostatnio dodane</h3>
                </header>
            
                <div class="row justify-content-center content-center">
                        
                        
                            <?php require('dbconnect.php'); 
                                $result = $mysqli->query('SELECT * FROM przepisy ORDER BY id LIMIT 8');
                                
                                while ($recipe = mysqli_fetch_array($result))
                                {
                                    $recipe_var = <<< HTML
                                    <div class="col-lg-3 col-sm-6">
                                    <div class="featured">
                                    <article>
                                    <figure>
                                    <img src="img/$recipe[zdjecie]">
                                    <figcaption>
                                    <a href=''>
                                    <i class="fas fa-eye"></i>
                                    <span>Zobacz przepis</span>
                                    </a>
                                    </figcaption>
                                    </figure>
                                    <div class="description">
                                    <h2>$recipe[nazwa]</h2>
                                    <hr>
                                    <div class="container_description">
                                    <p><i class="far fa-clock"></i>&nbsp$recipe[czas] min</p>
                                    <p><i class="fas fa-signal"></i>&nbsp$recipe[trudnosc]</p>
                                    </div>
                                    </div>
                                    </article>
                                    </div>
                                </div>
                                    
            
HTML;
echo $recipe_var;
                                }
                            ?>
                            </div>
                            </section>

                <section class="latest container-fluid">
                    <header class="title-ribbon">
                        <h3 class="ribbon-top">Losowe przepisy</h3>
                    </header>
                    <div class="row content-center">

                    <?php require('dbconnect.php'); 
                                $result2 = $mysqli->query('SELECT * FROM przepisy ORDER BY RAND() LIMIT 3');
                                
                                while ($recipe = mysqli_fetch_array($result2))
                                {
                                    $recipe_var2 = <<< HTML
                                    <div class="col-lg-3 col-sm-6">
                                    <div class="featured">
                                    <article>
                                    <figure>
                                    <img src="img/$recipe[zdjecie]">
                                    <figcaption>
                                    <a href=''>
                                    <i class="fas fa-eye"></i>
                                    <span>Zobacz przepis</span>
                                    </a>
                                    </figcaption>
                                    </figure>
                                    <div class="description">
                                    <h2>$recipe[nazwa]</h2>
                                    <hr>
                                    <div class="container_description">
                                    <p><i class="far fa-clock"></i>&nbsp$recipe[czas] min</p>
                                    <p><i class="fas fa-signal"></i>&nbsp$recipe[trudnosc]</p>
                                    </div>
                                    </div>
                                    </article>
                                    </div>
                                </div>
                                    
            
HTML;
echo $recipe_var2;
                                }
                                ?>

                    </div>
                </section>

        
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
        <script src="js/skrypty.js"></script>
    </body>
</html>