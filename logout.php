<?php
session_start();
unset($_SESSION['connecte']);
header('location: /index.php');