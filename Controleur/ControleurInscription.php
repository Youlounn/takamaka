<?php
class ControleurInscription
{
  function inscription($nom,$prenom,$mail,$mdp1,$mdp2,$link){
    if ($mdp1 == $mdp2) {

      $query = "INSERT INTO utilisateur VALUES (0,'$nom','$prenom','$mail','$mdp1','0');";
    	$result = $link->query($query);
    }
  }
}
?>
