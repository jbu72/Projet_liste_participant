<?php
// Connexion à la base de données
$con = mysqli_connect("localhost","root","","changement");
if(!$con){
    echo "Vous n'êtes pas connestés à la base de données";
}
?>