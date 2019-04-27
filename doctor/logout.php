<?php

session_start();

session_destroy();

unset($_SESSION['doctor']);

header("location: index.php");

?>