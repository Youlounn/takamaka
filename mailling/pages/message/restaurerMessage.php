<?php 
	$idMessage = $_GET['id'];
	require_once('../include/connexion.php');
	$req = $db->prepare('SELECT * FROM corbeillemessage WHERE id = ?');
	$req->execute(array($idMessage));
	if($message = $req->fetch())
	{
		//Insertion dans la table message	
		$req = $db->prepare("INSERT INTO corbeillemessage SET id = ?, type = ?, contenu = ?, dateCreation = ?, id_user = ?");
		$req->execute(array($message['id'], $message['type'], $message['contenu'], $message['dateCreation'], $message['id_user']));	
				
		///Suppression de la table corbeillemessage			
		$req = $db->prepare('DELETE FROM corbeillemessage WHERE id = ?');
		$req->execute(array($idMessage));
		header("Location:accueilMessage.php");
	}else {
?>
 
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <title>Takamaka</title>
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
        	<a href="../campagne/accueilCampagne.php" class="pull-right">
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


