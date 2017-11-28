<?php

class ControleurConnexion
{

  function connect($email,$password,$link)
  {

    // On selectionne la base de données souhaitée
    mysql_select_db('takamaka',$link);

    $query = "SELECT * FROM utilisateur WHERE email='$email' AND mdp='$password';";
  	$result = mysql_query($query, $link) or die($query . " - " . mysql_error());

  	$nbResults = mysql_num_rows($result);
  	if($nbResults == 1){
      Header('Location:/PW/Projet/takamaka/index.html');
    }
    else if($nbResults == 0){
      ControleurConnexion::erreur();
    }
  }

  function erreur()
  {
    Header('Location:/PW/Projet/takamaka/login.html');
  }
}

?>
