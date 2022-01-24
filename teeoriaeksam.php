<?php
//ühendus loomine
require_once ("conf.php");
// tabeli andmete muutmine
if(!empty($_REQUEST["teooriatulemus"])) {
    global $yhendus;
    $kask = $yhendus->prepare("UPDATE jalgrattaeksam SET teooriatulemus=? WHERE  id=?");
    $kask->bind_param("ii", $_REQUEST["teooriatulemus"], $_REQUEST["id"]);
    $kask->execute();
}
//tabeli sisu näitamine
$kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi FROM jalgrattaeksam WHERE teooriatulemus=-1");
$kask->bind_result($id, $eesnimi, $perekonnanimi);
$kask->execute();
//$yhendus->close();
?>
<?php
include ('header.php');
?>
<link rel="stylesheet" type="text/css" href="eksamstyle.css" />
    <body>
    <div id="logo">
        <img src="style/eksam23.png" alt="Logo">
    </div>
    <h1>Teooriaeksami tulemused</h1>
    <table id="ter">
        <tr>
            <th>Nimi</th>
            <th>Punktid</th>
            <th>Kinnita</th>
        </tr>
<?php
while($kask->fetch()){
    echo "
         <tr><td>$eesnimi $perekonnanimi</td>
        <td>
                <form action='?'>
                <input type='hidden' name='id' value='$id'>
                <input type='text' name='teooriatulemus' id='teo'>
                </td>
                <td id= 'okk'>
                <input type='submit' value='OK' id='ok'>
                </form>
                </td>
                </tr>";
}
?>
    </table>
    </body>
</html>
