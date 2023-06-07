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
    <section class="bg">
    <?php
    //vérifier que le button ajouter a bien été cliqué
    if(isset($_POST['button'])){
        //extraction des informations envoyées dans des variables par la méthode post
        extract($_POST);
        //Vérifier que tous les champs ont été remplis
        if(isset($nom) && isset($prenom) && isset($date_de_naissance) && isset($ville_origine) && $formation_de_base){
            //connexion à la base de donnée
            include_once "connexion.php";
            //requête d'ajout
            $req = mysqli_query($con, "INSERT INTO employe VALUES(NULL, '$nom', '$prenom', '$date_de_naissance', '$ville_origine', '$formation_de_base')");
            if($req){//si la requête a été effectuée avec succès, on fait une redirection
                header("Location: index.php");
            }else{//si non
                $message = "Participant non ajouté";
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
        <h2>Ajouter un apprenant</h2>
        <p class="erreur_message">
            <!-- Veuillez remplir tous les champs !!! -->
            <?php
            // si la variable existe, affichons son contenu
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom">
            <label>Prénom</label>
            <input type="text" name="prenom">
            <label>Date de naissance</label>
            <input type="date" name="date_de_naissance">
            <label>Ville d'origine</label>
            <input type="text" name="ville_origine">
            <label>Formation de base</label>
            <input type="text" name="formation_de_base">
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
    </section>
</body>
</html>