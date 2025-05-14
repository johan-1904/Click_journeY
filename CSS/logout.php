<?php
session_start();
session_destroy();

header('LOCATION: filtre.php');

?>
