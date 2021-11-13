<?php
session_start();
unset($_SESSION['adminn']["mail_a"]);
unset($_SESSION['adminn']["password_a"]);
header("Location:https://127.0.0.1/projet_web/log/login.html");
?>