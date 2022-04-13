<?php
require './core/pass.php';

try {
    $user = "root";//login
    $pdo = new PDO('mysql:host=localhost;dbname=dp-test;charset=utf8',$user,$pass);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";//met message d'erreur si erreur de connexion
    die();
}

