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
        <div class="padding-top background container-fluid">
            <section class="row">
                <div class="col">
                    <div class="add_recipe">
                        <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <h1 class="color">Dodaj nowy przepis</h1>
                            <section>
                                <h2>Podstawowe informacje</h2>
                                <p>Wszystkie pola są wymagane</p>
                                <input type="text" id="title" name="title" placeholder="Tytuł przepisu">
                                <input type="number" id="time" name="time" placeholder="Czas przygotowania w min">
                                <select name="category" id="category">
                                    <option value="" disabled>Kategoria</option>
                                    <option value="Ciasta">Ciasta</option>
                                    <option value="Ciastka">Ciastka</option>
                                    <option value="Obiad">Obiad</option>
                                    <option value="Desery">Desery</option>
                                    <option value="Dziecięce">Dziecięce</option>
                                    <option value="Napoje">Napoje</option>
                                    <option value="Sałatki">Sałatki</option>
                                    <option value="Surówki">Surówki</option>
                                    <option value="Zupa">Zupa</option>
                                    <option value="Pizza">Pizza</option>
                                    <option value="Ryby">Ryby</option>
                                    <option value="Śniadanie">Śniadanie</option>
                                </select>
                                <select name="difficult" id="difficult">
                                    <option value="" disabled>Poziom trudności</option>
                                    <option value="Łatwy">Łatwy</option>
                                    <option value="Średni">Średni</option>
                                    <option value="Trudny">Trudny</option>
                                </select>
                            </section>
                            <section>
                                <h2>Składniki</h2>
                                <div>
                                    <textarea name="ingr" id="ingr" cols="30" rows="10" placeholder="- Pierwszy składnik itd."></textarea>
                                </div>
                            </section>
                            <section>
                                <h2>Kroki przygotowania</h2>
                                <div>
                                    <textarea name="steps" id="steps" cols="30" rows="10" placeholder="1. Pierwszy krok"></textarea>
                                </div>
                            </section>
                            <section>
                                <h2>Zdjęcie</h2>
                                <div class="field upload">
                                <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
                                <input type="file" name="upload-file" id="upload-file">
                                    <label for="upload-file" id="file_input">
                                        <span>Wybierz plik z komputera</span>
                                    </label>
                                    <strong>Wybrany plik:</strong>
                                    <em id="file_name">None</em>
	                            </div>
                            </section>
                            <br>
                            <input type="submit" id="add" name="add" value="Dodaj przepis">
                        </form>
                        <?php
                            include('dbconnect.php');
                            
                            if (isset($_POST['add']))
                            {
                                $nazwa = strip_tags($_POST['title']);
                                $czas = strip_tags($_POST['time']);
                                $kategoria = strip_tags($_POST['category']);
                                $trudnosc = strip_tags($_POST['difficult']);
                                $skladniki = strip_tags($_POST['ingr']);
                                $wykonanie = strip_tags($_POST['steps']);
                                $zdjecie = $_FILES['upload-file']['name'];

                                $target = "img/".basename($zdjecie);


                                $statement = $mysqli->prepare('INSERT przepisy (nazwa, kategoria, skladniki, wykonanie, zdjecie, czas, trudnosc) VALUES (?,?,?,?,?,?,?)');
                                $statement->bind_param('sssssis', $nazwa, $kategoria, $skladniki, $wykonanie, $zdjecie, $czas, $trudnosc);
                                $statement->execute();
                                $statement->close();

                                if (move_uploaded_file($_FILES['upload-file']['tmp_name'], $target)) {
                                    $msg = "Image uploaded successfully";
                                }else{
                                    $msg = "Failed to upload image";
                                }
                                

                                header('Location:add.php');
                            }
                        ?>
                    </div>
                </div>
            </section>
        </div>
        
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
        <script src="js/skrypty.js"></script>
    </body>
</html>