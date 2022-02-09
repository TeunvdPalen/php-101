<?php

session_start();

$pdo = new PDO("mysql:host=localhost;dbname=todo_applicatie;port=3306", "root", "");