<?php
  
  if (isset($_GET['id'])) {

    require "./database/database.php";

    $id = $_GET['id'];

    $str = "SELECT * FROM livres WHERE id = :identifiant";

    $query = $bdd->prepare($str);

    $query->bindValue(':identifiant', $id, PDO::PARAM_INT);

    $query->execute();

    $data = $query->fetch(PDO::FETCH_ASSOC);

    $str = 'SELECT * FROM kiosque';

    $query =  $bdd->query($str);

    $kiosques = $query->fetchAll(PDO::FETCH_ASSOC);

  }

  if (isset($_POST['titre'])) {

    $titre = strip_tags(htmlentities($_POST['titre']));

    $str = "UPDATE livres SET titre = :title, date_parution = :datep, kiosque_id = :kio WHERE id = :identifiant";

    $query = $bdd->prepare($str);
    $query->bindValue(':title', $titre, PDO::PARAM_STR);
    $query->bindValue(":datep", $_POST['date_parution'], PDO::PARAM_STR);
    $query->bindValue(':kio', $_POST['kiosque_id'], PDO::PARAM_INT);
    $query->bindValue(':identifiant', $_POST['id'], PDO::PARAM_INT);

    if ($query->execute()) {
        echo "Reussi";
    }
  }



  if (isset($data) && !empty($data)) {

    ?>
        <form method="POST" action="">
            <input type="number" name="id" id="id" value="<?= $data['id']?>" hidden required>
            <input type="text" name="titre" id="titre" value="<?= $data['titre']; ?>">
            <input type="date" name="date_parution" id="date" value="<?= $data['date_parution'] ?>">
            <select name="kiosque_id">
                <?php
                    foreach($kiosques as $kiosque){
                        if ($data['kiosque_id'] == $kiosque['id']) {
                            echo "<option value='$kiosque[id]' selected>$kiosque[nom]</option>";
                        } else {
                            echo "<option value='$kiosque[id]'>$kiosque[nom]</option>";
                        }
                    }
                ?>
            </select>

            <input type="submit" value="Modifier">
        </form>
    <?php
  }
?>