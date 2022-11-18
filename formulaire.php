<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="formulaire.css">
    <link rel="stylesheet" href="./navBar/navBar.css">
    <title>Document</title>
</head>
<body>
    
    <main>
        <?php
            include "./navBar/navBar.php";
        ?>

        <form action="" method="POST">
            <h1>Ajouter une oeuvre</h1>
            <input type="text" name="titre" id="titre" placeholder="Titre" required />
            <input type="date" name="date_parution" id="date_parution" placeholder="Date de parution" required />
            <select name="genre" id="genre">
                <option value="1">Romantique</option>
                <option value="2">Policier</option>
            </select>
            <select name="auteur" id="auteur">
                <option value="1">Jean Valjean</option>
                <option value="2">Montesquieu</option>
            </select>
            <input type="submit" value="Enregistrer" />
        </form>
    </main>

    <?php

        if(isset($_POST['titre']) && !empty($_POST['titre'])) {
            var_dump($_POST);
        }

    ?>

</body>
</html>