<?php 
	$idCampagne = $_GET['id'];
	require_once('../include/connexion.php');
	$req = $db->prepare('SELECT * FROM campagne WHERE id = ?');
	$req->execute(array($idCampagne));
	if($campagne = $req->fetch())
	{
//Insertion dans la table corbeillecampagne	
		$req = $db->prepare("INSERT INTO corbeillecampagne SET id = ?, titre = ?, nom = ?, date = ?, adrRep = ?, adrExp = ?, type = ?, id_message = ?, 
			id_user = ?");
		$req->execute(array($campagne['id'], $campagne['titre'], $campagne['nom'], $campagne['date'], $campagne['adrRep'], $campagne['adrExp'], 
		$campagne['type'], $campagne['id_message'], 1));	
				
		///Suppression de la table campagne			
		$req = $db->prepare('DELETE FROM campagne WHERE id = ?');
		$req->execute(array($idCampagne));
		header("Location:accueilCampagne.php");
	}else {
?>
 
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../../images/logo2.JPG"><title>AfricaRice</title>
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../mesBoutons.css"> 
    <link rel="stylesheet" href="../../Icon-font/assets/Pe-icon-7-stroke.css">
    <link rel="stylesheet" href="../../Icon-font/pe-icon-7-stroke/css/helper.css">
    <link rel="stylesheet" href="../../font-awesome/css/font-awesome.css">
     <link rel="stylesheet" href="../../ionicons/css/ionicons.min.css">
</head>
<body>
	<table class="table table-bordered">
 	<tr>
    	<td class="alert alert-danger ">Aucune campagne ne correspond à cet identifiant! 
        	<a href="accueilCampagne.php" class="pull-right">
           	   <button class="btn-vert"><i class="pe-7s-back pe-2x"></i>Retourner </button>
           </a>
        </td>
    </tr>
    <?php
		}
	?>
 </table>	
</body>
</html>


