<?php
session_start();
if (isset($_POST['logout'])){
$_SESSION = array();
session_destroy();
header('Location: index1.php');
exit();
}
?>

<!-- Une autre méthode de Déconnexion -->
<?php
// session_start();
// $_SESSION = array();
// session_destroy();
// header('Location: index1.php');
?>