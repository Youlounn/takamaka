<?php
include 'ControleurConnexion.php';
include 'ControleurInscription.php';

if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['validConnexion'])) {
  $link = Routeur::connectDB();
  ControleurConnexion::connect($_POST['login'],$_POST['password'],$link);
}
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['mdp1']) && isset($_POST['mdp2']) && isset($_POST['validInscription'])) {
  $link = Routeur::connectDB();
  ControleurInscription::inscription($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['mdp1'],$_POST['mdp2'],$link);
}

class Routeur
{

  function connectDB()
  {
    $hote = 'localhost'; // Adresse du serveur
    $login = 'root'; // Login
    $pass = ''; // Mot de passe
    $base = 'takamaka'; // Base de données à utiliser

    // On se connecte à la base de données
    $link = mysql_connect($hote, $login, $pass);

    // On selectionne la base de données souhaitée
    $db = mysql_select_db($base,$link);
    return $link;
  }
}

?>
