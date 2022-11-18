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

            $data = [
                [
                    "titre" => "20000 lieu sous les mers",
                    "parution" => "Mai 1985",
                    "auteur" => "Jean Valjean",
                    "coEcrit" => "non"
                ],
                [
                    "titre" => "Nautilus",
                    "parution" => "Avril 1978",
                    "auteur" => "Montesquieu",
                    "coEcrit" => "non"
                ],
                [
                    "titre" => "Les 100 dalmatiens",
                    "parution" => "Avril 1990",
                    "auteur" => "Test",
                    "coEcrit" => "oui"
                ]
            ];

            include "./navBar/navBar.php";

        ?>

        <div class="content">
            <table class="dataTable">
                <thead>
                    <tr class="thead">
                        <td class="entete">Titre</td>
                        <td class="entete">Date de parution</td>
                        <td class="entete">Auteur</td>
                        <td class="entete">Co-écrit</td>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $i = 1;
                        foreach($data as $array) {
                            echo '<tr class="tableRow">';
                            foreach($array as $info) {
                                echo '<td class="tableCell">'.$info.'</td>';
                            }
                            echo '</tr>';
                            $i++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>
