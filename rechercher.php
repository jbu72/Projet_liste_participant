 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<table>
            <tr id="items">
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Ville d'origine</th>
                <th>Formation de base</th>
            </tr>
    <?php
    require_once 'connexion.php';
    //récupérer la recherche
    $recherche = isset($_POST['search']) ? $_POST['search'] : '';

    //la requête mysql
    $q = $con->query("SELECT * FROM employe WHERE nom like '%$recherche' or prenom like '%$recherche' or date_de_naissance like '%$recherche' or ville_origine like '%$recherche' or formation_de_base like '%$recherche' LIMIT 10");

    //affichage du résultat
    while($row = mysqli_fetch_array($q)){
        ?>
        <tr>
        <td><?=$row['nom']?></td>
        <td><?=$row['prenom']?></td>
        <td><?=$row['date_de_naissance']?></td>
        <td><?=$row['ville_origine']?></td>
        <td><?=$row['formation_de_base']?></td>
        
    </tr>
    <?php

    }
    ?>
</table>
</body>
</html>