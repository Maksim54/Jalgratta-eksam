<?php
// ühenduse loomine
require_once ("conf.php");
// tabeli täitemine
if(isSet($_REQUEST["sisestusnupp"])) // нажатие на кнопку
{
    global $yhendus;
    $kask=$yhendus->prepare("INSERT INTO jalgrattaeksam(eesnimi, perekonnanimi) VALUES (?, ?)");
    $kask->bind_param("ss", $_REQUEST["eesnimi"], $_REQUEST["perekonnanimi"]);
    $kask->execute();
    $yhendus->close(); // закрыть соединение
    header("Location: $_SERVER[PHP_SELF]?lisatudnimi=$_REQUEST[eesnimi]");
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style/formstyle.css">
    <title>Registreerimine</title>
    <meta charset="UTF-8"/>
</head>
<body>
<h1>Eksami registreerimine</h1>
<form action="?">
    Eesnimi:
    <br>
    <input type="text" name="eesnimi"/>
    <br>
    Perekonnanimi:
    <br>
    <input type="text" name="perenimi"/>
    <br>
    <input type="submit" name="sisestusnupp" value="Sisesta"/>
    <br>
    <button type="button"
            onclick="window.location.href='teeoriaeksam.php'";
            class="cancelbtn">Cancel</button>
    <strong> </strong>
    <?php
    if (isSet($_REQUEST["lisatudnimi"])){
        echo "Lisati $_REQUEST[lisatudnimi]";
    }
    ?>
<p id="time"></p>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
    var timestamp = '1643019567';
    function updateTime(){
        $('#time').html(Date(timestamp));
        timestamp++;
    }
    $(function(){
        setInterval(updateTime, 1000);
    });
</script>
</html>