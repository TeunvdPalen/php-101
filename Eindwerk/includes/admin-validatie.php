<?php

if ($_SESSION['user']['admin'] == false) {
  header('location: index.php?error=Je bent niet gemachtigd!');
}