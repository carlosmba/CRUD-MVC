<?php
session_destroy();
$_SESSION = array();

header('Location: login');
// echo '<script> window.location = "index.php?pag=login" </script>';



?>