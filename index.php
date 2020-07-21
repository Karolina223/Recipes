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
        
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400&display=swap" rel="stylesheet">  
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
        <main class="main">
            <div class="intro">
                <div class="intro-text">
                    <h1 class="color">The Beauty Chef</h1>
                    <img class="ornament" src="img/floral.svg" alt="">
                    <h3>Twój przepis na sukces w kuchni!</h3>
                </div>
            </div>
            <?php require('dbconnect.php');
            
                
                $random = $mysqli->query('SELECT * FROM przepisy ORDER BY RAND()');
                $random_recipe = mysqli_fetch_array($random);

                $main = <<< HTML

            <div class="row">
            <div class="recipe_of_the_day">
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
                            <img class="divider-recipe-day" src="img/divider.svg" alt="">
                            <div class="container_description">
                            <p><i class="far fa-clock"></i>&nbsp$random_recipe[czas] min</p>
                            <p><i class="fas fa-signal"></i>&nbsp$random_recipe[trudnosc]</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            </div>

HTML;
echo $main;
            ?>
            
        </main>
        <!-- Kategorie ----------------------------------------->
        <article>
            <section class="main-section">
                <div class="category row">
                    <nav class="category-nav">
                    <?php require('nav_category.php'); ?>
                    </nav>
                </div>
            </section>

            <!-- Ostatnio dodane ---------------------------------------------- -->
            <section class="latest">
                <header class="title-ribbon">
                    <h3 class="ribbon-top">Ostatnio dodane</h3>
                </header>
            
                <div class="row">
                        
                        
                            <?php require('dbconnect.php'); 
                                $result = $mysqli->query('SELECT * FROM przepisy ORDER BY id LIMIT 8');
                                
                                while ($recipe = mysqli_fetch_array($result))
                                {
                                    $recipe_var = <<< HTML
                                    
                                    <div class="featured">
                                    <article class="article">
                                    <figure>
                                    <img class="recipe_image" src="img/$recipe[zdjecie]">
                                    <figcaption>
                                    <a href=''>
                                    <i class="fas fa-eye"></i>
                                    <span>Zobacz przepis</span>
                                    </a>
                                    </figcaption>
                                    </figure>
                                    <div class="description">
                                    <h2>$recipe[nazwa]</h2>
                                    <img class="divider" src="img/divider.svg" alt="">
                                    <div class="container_description">
                                    <p><i class="far fa-clock"></i>&nbsp$recipe[czas] min</p>
                                    <p><i class="fas fa-signal"></i>&nbsp$recipe[trudnosc]</p>
                                    </div>
                                    </div>
                                    </article>
                                    </div>
                                    
            
HTML;
echo $recipe_var;
                                }
                            ?>
                            </div>
                            </section>

                <section class="latest">
                    <header class="title-ribbon">
                        <h3 class="ribbon-top">Losowe przepisy</h3>
                    </header>
                    <div class="row">

                    <?php require('dbconnect.php'); 
                                $result2 = $mysqli->query('SELECT * FROM przepisy ORDER BY RAND() LIMIT 4');
                                
                                while ($recipe = mysqli_fetch_array($result2))
                                {
                                    $recipe_var2 = <<< HTML
                                    <div class="featured">
                                    <article class="article">
                                    <figure>
                                    <img  class="recipe_image" src="img/$recipe[zdjecie]">
                                    <figcaption>
                                    <a href=''>
                                    <i class="fas fa-eye"></i>
                                    <span>Zobacz przepis</span>
                                    </a>
                                    </figcaption>
                                    </figure>
                                    <div class="description">
                                    <h2>$recipe[nazwa]</h2>
                                    <img class="divider" src="img/divider.svg" alt="">
                                    <div class="container_description">
                                    <p><i class="far fa-clock"></i>&nbsp$recipe[czas] min</p>
                                    <p><i class="fas fa-signal"></i>&nbsp$recipe[trudnosc]</p>
                                    </div>
                                    </div>
                                    </article>
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