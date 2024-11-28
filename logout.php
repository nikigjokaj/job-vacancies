<?php
session_start();
unset($_SESSION['session_id']);
unset($_SESSION['session_username']);
header(("Location: login.php"));
die();
