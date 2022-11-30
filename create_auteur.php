<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="./navBar/navBar.css" />
    <title>Ajout d'auteur</title>
</head>
<body>

<?php

    require "./database/database.php";

    include "./navBar/navBar.php"

?>

<form action="" method="POST">
    <input type="text" name="nom" id="nom" placeholder="Nom">
    <input type="text" name="prenom" id="prenom" placeholder="Prénom">
    <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
    <input type="submit" value="Enregistrer">
</form>


<?php

    if(
        isset($_POST['nom'], $_POST['prenom'], $_POST['pseudo'])
        && (!empty($_POST['nom']) && !empty($_POST['prenom']))
        || !empty($_POST['pseudo']) 
    ) { 
        $nom = strip_tags(htmlentities($_POST['nom']));
        $prenom = strip_tags(htmlentities($_POST['prenom']));
        $pseudo = strip_tags(htmlentities($_POST['pseudo']));

        $str = 'SELECT * FROM auteur';

        $query = $bdd->query($str);
        $auteurs = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($auteurs as $auteur) {
            $exist = false;
            if(($auteur['nom'] == $nom && $auteur['prenom'] == $prenom) || ($auteur['pseudo'] == $pseudo && !empty($pseudo))) {
                $exist = true;
                break;
            } 
        }

        if($exist == false) {
            $str = "INSERT INTO auteur (nom, prenom, pseudo) VALUES (:nom, :prenom, :pseudo)";

            $query = $bdd->prepare($str);

            $query->bindValue(':nom', $nom, PDO::PARAM_STR);
            $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);

            if($query->execute()){
                echo "<span class='success'>Auteur ajouté avec succées.</span>";
            } else {
                echo "<span class='error'>Une erreur s'est produite, merci de reéssayer.</span>";
            }
        } else {
            echo "<span class='error'>Cet auteur existe déjà</span>";
        }

        
    } else {
        echo "<span class='error'>Merci de renseigner tout les champs</span>";
    }


?>


<script type='text/javascript'>

    let errormessage = document.querySelector('.error');

    function disapear() {
        errormessage.remove();
    }

    setTimeout(disapear, 5000)
    

</script>

    
</body>
</html>