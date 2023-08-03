<?php
session_start();
unset($_SESSION["txtUsuario"]);
session_destroy();
header("Location: ../index.php");
exit;
?>