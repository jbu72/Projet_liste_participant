<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

        //connexion à la base de donnée
        include_once "connexion.php";
        //on récupère le id dans le lien
        $id = $_GET['id'];

        //requête pour afficher les infos d'un participant
        $req = mysqli_query($con, "SELECT * FROM employe WHERE id = $id");
        $row = mysqli_fetch_assoc($req);
 

    //vérifier que le button ajouter a bien été cliqué
    if(isset($_POST['button'])){
        //extraction des informations envoyées dans des variables par la méthode post
        extract($_POST);
        //Vérifier que tous les champs ont été remplis
        if(isset($nom) && isset($prenom) && isset($date_de_naissance) && isset($ville_origine) && $formation_de_base){
           
            //requête de modification
            $req= mysqli_query($con, "UPDATE employe SET nom = '$nom' , prenom = '$prenom' , date_de_naissance = '$date_de_naissance' , ville_origine = '$ville_origine' , formation_de_base = '$formation_de_base' WHERE id= $id");
            if($req){//si la requête a été effectuée avec succès, on fait une redirection
                header("Location: index.php");
            }else{//si non
                $message = "Apprenant non modifié";
            }
        }else{
            // si non
            $message = "Veuillez remplir tous les champs !";
        }
        // echo "Vous avez cliqué sur le button";
    }
    ?>
    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png">Retour</a>
        <h2>Modifier un apprenant : <?=$row['nom']?> </h2>
        <p class="erreur_message">
            <?php
            if(isset($message)){
                echo $message;
            }
            ?>
            <!-- Veuillez remplir tous les champs !!! -->
        </p>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom" value="<?=$row['nom']?>">
            <label>Prénom</label>
            <input type="text" name="prenom" value="<?=$row['prenom']?>">
            <label>Date de naissance</label>
            <input type="date" name="date_de_naissance" value="<?=$row['date_de_naissance']?>">
            <label>Ville d'origine</label>
            <input type="text" name="ville_origine" value="<?=$row['ville_origine']?>">
            <label>Formation de base</label>
            <input type="text" name="formation_de_base" value="<?=$row['formation_de_base']?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>
</html>