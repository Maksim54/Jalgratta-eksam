<?php
//ühendus loomine
require_once ("conf.php");
// tabeli andmete muutmine
if(!empty($_REQUEST["korras"])) {
    global $yhendus;
    $kask = $yhendus->prepare("UPDATE jalgrattaeksam SET t2nav=1 WHERE  id=?");
    $kask->bind_param("i", $_REQUEST["korras"]);
    $kask->execute();
}
if(!empty($_REQUEST["vigane"])) {
    $kask = $yhendus->prepare("UPDATE jalgrattaeksam SET t2nav=-1 WHERE  id=?");
    $kask->bind_param("i", $_REQUEST["vigane"]);
    $kask->execute();
}
//tabeli sisu näitamine
$kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi FROM jalgrattaeksam WHERE
                                                            teooriatulemus>10 AND t2nav=-1");
$kask->bind_result($id, $eesnimi, $perekonnanimi);
$kask->execute();
//$yhendus->close();
?>
<?php
include ('header.php');
?>
<body>
<div id="logo">
    <img src="style/eksam23.png" alt="Logo">
</div>
<link rel="stylesheet" type="text/css" href="eksamstyle.css" />
<h1>Tänava sõidueksam</h1>
<table id="tanav">
    <tr>
        <th id= 'nimii'>  Nimi</th>
        <th id= 'vormist'>Vormistada</th>
    </tr>
    <?php
    while($kask->fetch()){
        echo "
                <td>$eesnimi  $perekonnanimi</td>
                <td>
                <a href='?korras=$id'>Korras</a>
                <a href='?vigane=$id'>Vigane</a>
                </td>
                </tr>  
                ";
    }
    ?>
</table>
</body>
</html>