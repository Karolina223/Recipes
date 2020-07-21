<?php

$nav = <<< HTML

<nav>
<ul class="main-nav">
    <li><a href="index.php">Strona główna</a></li>
    <li><a href="#">Przepisy</a></li>
    <li><a href="#">Blog</a></li>
    <li><a href="#">Kontakt</a></li>
</ul>
<ul class="user-nav">
    <li><a href="add.php">Dodaj przepis</a></li>
    <li><a href="login.php">Logowanie / Rejestracja</a></li>
</ul>
</nav>

HTML;

echo $nav;