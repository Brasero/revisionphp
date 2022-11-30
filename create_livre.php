<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="formulaire.css">
    <link rel="stylesheet" href="./navBar/navBar.css">
    <title>Ajouter oeuvre</title>
</head>
<body>
    
    <main>
        <?php

            require "./database/database.php";

            $str = 'SELECT * FROM kiosque';
            $query = $bdd->query($str);
            $kiosques = $query->fetchAll(PDO::FETCH_ASSOC);

            include "./navBar/navBar.php";
        ?>

        <form action="" method="POST">
            <h1>Ajouter une oeuvre</h1>
            <input type="text" name="titre" id="titre" placeholder="Titre" required />
            <input type="date" name="date_parution" id="date_parution" placeholder="Date de parution" required />
            <!--<select name="genre" id="genre">
                <option value="1">Romantique</option>
                <option value="2">Policier</option>
            </select>-->
            <select name="kiosque" id="kiosque">

                <?php
                    foreach($kiosques as $kiosque) {
                        echo "<option value='$kiosque[id]'>$kiosque[nom]</option>";
                    }
                ?>


            </select>
            <input type="submit" value="Enregistrer" />
        </form>
    </main>

    <?php

        if(isset($_POST['titre'], $_POST["kiosque"], $_POST['date_parution']) && !empty($_POST['titre']) && !empty($_POST['kiosque']) && !empty($_POST['date_parution'])) {

            $titre = strip_tags(htmlentities($_POST['titre']));
            $date = strip_tags(htmlentities($_POST['date_parution']));
            $kiosque = strip_tags($_POST['kiosque']);

            $str = "INSERT INTO livres (titre, date_parution, kiosque_id) VALUES (:titre, :date_p, :kiosque)";

            $query = $bdd->prepare($str);
            $query->bindValue(':titre', $titre, PDO::PARAM_STR);
            $query->bindValue(':date_p', $date, PDO::PARAM_STR);
            $query->bindValue(':kiosque', $kiosque, PDO::PARAM_INT);
            $query->execute();
            
        }

    ?>

</body>
</html>