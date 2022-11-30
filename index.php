<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="./index.css" />
    <link rel="stylesheet" href="./navBar/navBar.css" />
    <title>Document</title>
</head>
<body>

    <main class="container">
        <?php

            require "./database/database.php";

            $str = "SELECT * FROM livres 
                    INNER JOIN kiosque
                    ON
                    livres.kiosque_id = kiosque.id";

            $query = $bdd->query($str);

            $data = $query->fetchAll(PDO::FETCH_ASSOC);

            var_dump($data);

            include "./navBar/navBar.php";

        ?>

        <div class="content">
            <table class="dataTable">
                <thead>
                    <tr class="thead">
                        <td class="entete">Titre</td>
                        <td class="entete">Date de parution</td>
                        <td class="entete">Kiosque</td>
                        <td class="entete">Co-écrit</td>
                    </tr>
                </thead>

                <tbody>
                    <?php












                        $i = 1;
                        foreach($data as $array) {
                            echo '<tr class="tableRow">
                            <td class="tableCell">'.$array['titre'].'</td>
                            <td class="tableCell">'.$array['date_parution'].'</td>
                            <td class="tableCell">'.$array['nom'].'</td>
                            </tr>';
                             $i++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>
