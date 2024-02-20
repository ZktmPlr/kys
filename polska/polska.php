<?php
session_start();
$nick = $_SESSION["nick"];
echo "Witaj $nick w Polsce";
?>