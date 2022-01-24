<?php
//ühendus loomine
require_once ("conf.php");
// tabeli andmete muutmine
//tabeli sisu näitamine
global $yhendus;
$kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi, teooriatulemus, t2nav, slaalom FROM jalgrattaeksam");
$kask->bind_result($id, $eesnimi, $perekonnanimi, $teooriatulemus, $t2nav, $slaalom);
$kask->execute();
//$yhendus->close();
?>
<?php
include ('header.php');
?>
    <body>
    <link rel="stylesheet" type="text/css" href="eksamstyle.css" />
    <h1 id="tunistus">Tunnistus</h1>
    <table id="tun">
        <tr>
            <th>Nimi</th>
            <th id="teooria">Teooria</th>
            <th>Tänavasõit</th>
            <th>Slalom</th>
            <th>Vormistada</th>
        </tr>
<?php
/*if(isSet($_REQUEST["kaubalisamine"])){
lisaKaup($_REQUEST["nimetus"], $_REQUEST["kaubagrupi_id"], $_REQUEST["hind"]);
header("Location: kaubahaldus.php");
exit();
}*/
$vormis = "Vormistatud";
$vormista = "Vormistamata";
$nupp = "<input type='submit' name='vormi' value='Vormistada'/>";
while($kask->fetch()){
    if($t2nav>0)
    {
        $t2nav = "OK";
    }
    if($t2nav<0)
    {
        $t2nav = "Ei";
    }
    if($teooriatulemus<10)
    {
        $teooriatulemus = "Ei";
    }
    if($teooriatulemus>=10)
    {
        $teooriatulemus = "OK";
    }
    if($slaalom>0)
    {
        $slaalom = "OK";
    }
    if($slaalom<0)
    {
        $slaalom = "Ei";
    }

    if($t2nav=="OK" && $teooriatulemus!="Ei" && $slaalom=="OK")
    {

        echo "
                   <form action ='?'>     
               <tr>
                <td>$eesnimi $perekonnanimi</td>
                <td>$teooriatulemus</td>
                <td>$t2nav</td>
                <td>$slaalom</td>
                        <td> $nupp </td>                                              
                ";
        if(isSet($_REQUEST["vormi"])){

            //$nupp= "";
            echo "             
                <td>$vormis </td>
                 </tr>
                ";
        }
    }
    else{
        echo "
               <tr>
                <td>$eesnimi $perekonnanimi</td>
                <td>$teooriatulemus</td>
                <td>$t2nav</td>
                <td>$slaalom</td>
                <td> $vormista
                 </td>            
                </tr>  
          </form>
                "
        ;
    }
}
?>
    </table>
    </body>
</html>
