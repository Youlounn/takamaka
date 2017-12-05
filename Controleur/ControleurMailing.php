<?php
class ControleurMailing
{
  function getMailing($link){

    if (!($_SERVER['REQUEST_METHOD'] === 'POST')) {
      return false;
    }
      $query = "SELECT * from mailing;";
    	$result = $link->query($query);
      echo json_encode($result->fetchAll());
    }
  }
?>
