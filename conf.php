<?php
$baasiaadress = "localhost";
$baasikasutaja = "mlagunovski";
$baasiparool = "123456";
$baasinimi = "mlagunovski";
$yhendus = new mysqli($baasiaadress, $baasikasutaja, $baasiparool, $baasinimi);
$yhendus->set_charset("UTF8");
