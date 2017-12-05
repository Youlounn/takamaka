<?php

class ControleurConnexion
{

  function connect($email,$password,$link)
  {

    $query = "SELECT * FROM utilisateur WHERE email='$email' AND mdp='$password';";
  	$result = $link->query($query);

  	$nbResults = count($result);
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
