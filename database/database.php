<?php

$host = 'localhost';
$dbname = 'librairie';
$user = 'root';
$mdp = '';
$char = 'utf8';

try {
    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';char='.$char, $user, $mdp);
} catch(PDOException $e) {
    echo "ERREUR : ". $e->getMessage();
    die;
}


?>