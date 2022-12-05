<?php

require "./database/database.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $str = "DELETE FROM livres WHERE id = :identifiant";

    $query = $bdd->prepare($str);

    $query->bindValue(':identifiant', $id, PDO::PARAM_INT);

    if ($query->execute()) {
        $success = 'true';
    } else {
        $success = 'false';
    }
    header('Location: index.php?success='.$success);
} else {
    $msg = 'Une erreur s\'est produite merci de réessayer.';

    header('Location: index.php?message='.$msg);
}


?>