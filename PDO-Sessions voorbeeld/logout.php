<?php

include './includes/initialize.php';

unset($_SESSION['user']);

header('location: index.php');
exit;