<!DOCTYPE html>
<html>
<head>
    <title>Jalgrattaeksam</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="eksamstyle.css" />
</head>
<body>
<div id="menuArea">
    <a href="reg.php">Loo uus kasutaja</a>
    <br>
    <?php
    if(isset($_SESSION['knimi'])){
        ?>
        <a href="logout.php">Logi välja</a>
        <h1>Tere, <?="$_SESSION[knimi]"?></h1>
        <?php
    }
    else {
        ?>
        <a href="logineksam.php">Logi sisse</a>
        <br>
        <?php
    }
    ?>
</div>
<header>
    <h1>Jalgrattaeksam</h1>
</header>
<nav>
    <ul>
        <li><a href="registreerimine.php">Registreerimine</a></li>
        <li><a href="teeoriaeksam.php">Teooriaeksam</a></li>
        <li><a href="tanavaeksam.php">Sõidueksam</a></li>
        <li><a href="slalom.php">Slalom</a></li>
        <li><a href="tunnistus.php">Tunnistus</a></li>
    </ul>
</nav>