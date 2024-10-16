<?php

session_start();
session_unset();
session_destroy();

header("Location: ../verify_login.php");
exit();

?>