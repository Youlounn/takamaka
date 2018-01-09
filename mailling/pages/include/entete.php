<?php 
	require_once"session.php";
	if($prenom =="")
	{
		header("Location:index.php");
	}
	require_once('connexion.php');
	require_once('fonctions.php');
  ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../Icon-font/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="../../Icon-font/pe-icon-7-stroke/css/helper.css">
    <link rel="stylesheet" href="../../ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../mesBoutons.css">
    <style>
    	ul .dropdown-menu  {
		background-color:#000000;
		}
		ul .dropdown-menu a {
		outline:none;
		color:#FFFFFF;
		}
    </style>
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
    	<div>
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><img src="../../images/logo-takamaka.jpg" alt="" width="150px" height="35px"></a>
              <span class="bienvenuUser" 
              style="display:inline-block; border-left:3px groove #FFFFFF;border-right:1px groove #FFFFFF"">
             	  <img src="../../images/bienvenue6.jpg"alt="Bienvenue" width="90" height="60">               
               </span>
               <span class="bienvenuUser" style="padding-top:-12px; padding-right:20px; border-right:solid #FFFFFF; padding:20px; color:#FFFFFF"> <?php echo $prenom;?> &nbsp;&nbsp; <?php echo $nom;?>
               </span>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#bibliotheque" data-toggle="dropdown">Bibliothèque </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Messages</a></li>
                        <li><a href="#">Mailing</a></li>
                    </ul>
                </li>
                <li><a href="../campagne/accueilCampagne.php">Gestion des campagnes</a></li>
                <li><a href="#configuration">Configuration</a></li>
                <li><a href="#campagne" data-toggle="dropdown">Corbeille</a>
                	<ul class="dropdown-menu">
                    	<li><a href="../corbeille/corbeilleCampagne.php">Campagne</a></li>
                        <li><a href="../corbeille/corbeilleMessage.php">Messages</a></li>
                        <li><a href="../corbeille/corbeilleMailing.php">Mailing</a></li>
                    </ul>
                </li>
                <li style="padding-left:440px">
                    <a href="deconnexion.php">
                         <span class="pe-7s-lock pe-2x" style="margin-right:5px;"></span>Déconnexion
                    </a>
                </li>
              </ul>
            </div>
        </div>
    </nav>
