<?php
require_once("../config/Conex.php");
session_destroy();
header("Location: ../index.php");
exit();
?>