<?php
class ControleurInscription
{
  function inscription($nom,$prenom,$mail,$mdp1,$mdp2,$link){
    if ($mdp1 == $mdp2) {
      mysql_select_db('takamaka',$link);

      $query = "INSERT INTO utilisateur VALUES (0,'$nom','$prenom','$mail','$mdp1','0');";
    	$result = mysql_query($query, $link) or die($query . " - " . mysql_error());
    }
  }
}
?>
