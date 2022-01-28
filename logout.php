<?php
session_start();
session_destroy();
header("location: tunnistus.php");