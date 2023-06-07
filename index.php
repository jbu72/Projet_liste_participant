<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des apprenants D-CLIC</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="background">
    
    <div class="container">
        <a href="ajouter.php" class="Btn_add"><img src="images/plus.png">Ajouter</a>
        <form  action="rechercher.php" method="POST">
            <input class="rech"  type="text" name="search" placeholder="Rechercher ici !!!">
            <button type="submit">Rechercher</button>
        </form> 
        <!-- <input type="search" placeholder="Rechercher un apprenant ici !" aria-label="Recherche" id="Recherche" name="search"> -->
     
        <table>
            <tr id="items">
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Ville d'origine</th>
                <th>Formation de base</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php
        //inclure la page de connexion
        include_once "connexion.php";
        //requête pour afficher la liste des participants
        $req = mysqli_query($con , "SELECT * FROM employe");
        if(mysqli_num_rows($req) == 0){
            //s'il n'existe pas de participants dans la base de donnée, alors on affiche ce message : 
            echo "il n'y a pas encore d'apprenant ajouté ! ";
        }else{
            //si non affichons la liste de tous les participants
            while($row=mysqli_fetch_assoc($req)){
                ?>
                <tr>
                    <td><?=$row['nom']?></td>
                    <td><?=$row['prenom']?></td>
                    <td><?=$row['date_de_naissance']?></td>
                    <td><?=$row["ville_origine"]?></td>
                    <td><?=$row['formation_de_base']?></td>
                    <!-- Nous allons mettre l'id de chaque participant dans ce lien -->
                    <td><a href="modifier.php?id=<?=$row['id']?>"><img src="images/pen.png"></a></td>
                    <td><a href="supprimer.php?id=<?=$row['id']?>"><img src="images/trash.png"></a></td>
                </tr>
                <?php
            }
        }
        ?>

            <!-- <tr>
                <td>Steev</td>
                <td>Johson</td>
                <td>25 ans</td>
                <td><a href="modifier.php"><img src="images/pen.png"></a></td>
                <td><a href="#"><img src="images/trash.png"></a></td>
            </tr> -->

            <!-- <tr>
                <td>Steev</td>
                <td>Johson</td>
                <td>25 ans</td>
                <td><a href="modifier.html"><img src="images/pen.png"></a></td>
                <td><a href="#"><img src="images/trash.png"></a></td>
            </tr> -->
        </table>
    </div>
</section>
</body>
</html>