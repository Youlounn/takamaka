<?php 
	require_once('../include/session.php'); 
	if($prenom =="")
	{
		header("Location:../index.php");
	}
	require_once('../include/fonctions.php');
	require_once('../include/connexion.php');
	
	if(!empty($_POST)){
		require_once("../include/connexion.php");
		$errors = array();
		if(empty($_POST['titre']))
		{
			$errors['titre'] = "Vous n'avez pas saisi de Titre de la campagne!";
		}
		if(empty($_POST['type']))
		{
			$errors['type'] = "Vous n'avez pas sélectionné le type de la campagne!";
		}
		if(empty($_POST['adrExp']))
		{
			$errors['adrExp'] = "Vous n'avez pas saisi l'adresse de l'expéditeur!";
		}
		if(empty($_POST['adrRep']))
		{
			$errors['adrRep'] = "Vous n'avez pas saisi l'adresse de réponse!";
		}
		if(empty($_POST['dateCampagne']))
		{
			$errors['dateCampagne'] = "Vous n'avez pas saisi la date de la campagne!";
		}
				
		if(empty($errors))
		{
			$req = $db->prepare("INSERT INTO campagne SET titre = ?, date = ?, adrRep = ?, adrExp = ?, type = ?, id_user = ?");
			$req->execute(array($_POST['titre'], $_POST['dateCampagne'], $_POST['adrRep'], $_POST['adrExp'], $_POST['type'], $idUser));	
			$idCampagne = $db->lastInsertId();
			header("Location:finAjoutCampagne.php?id=$idCampagne");
			exit();
		}
	}
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale=1.0"> 
    <title>Nouvelle campagne</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../Icon-font/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="../../Icon-font/pe-icon-7-stroke/css/helper.css">
    <link rel="stylesheet" href="../mesBoutons.css">
    <style>
			
        body{
			background-color:#F9F9F9;
            font-size:16px;
            }
            
        .field{
                position:relative;
                height:77px;
                padding: 16px 2px 8px 0px;
            }
            
        .field-label{
                position:relative;
                margin:0px;
                
                color:#95a5a6;
                line-height:16px;
                font-size:16px;
                font-weight:400;
                display:block;
                transform:translateY(24px);
                transition: transform 0.3s;
                transform-origin:0 50%;
                }
                
        .field-input{
                position:relative;
                display: block;
                width: 100%;
                height:32px;
                padding: 8px 0px;
                
                line-height: 16px;
                font-family: Roboto;
                font-size: 16px;
                
                background:transparent;	
                border: none;
                -webkit-appearance: none;
                outline: none;
                }
                
        .field::after, .field::before{
                content:'';
                height:2px;
                width:100%;
                position:absolute;
                bottom:6px;
                left:0px;
                
                background-color:#e7e7e7;
                transition: height 0.3s;
                }
                
        .field::after{
                    background-color:#3AB6CF;
                    transform: scaleX(0);
                    transition: transform 0.3s;
                    }
                    
        .has-label .field-label{
                transform:translateY(0) scale(0.75);
                }	
                
        .is-focused .field-label{
                color:#27ae60;
                }
            
        .field.is-focused::after{
                transform: scaleX(1);
                }
                
        .field.is-focused::before{
                height:32px;
                }
         .container{
			 background-color:white;
			 margin-top:62px;
			 margin-bottom:10px;
			 border:1px solid #27ae60;
            box-shadow:3px 3px 6px #16a085;
		 }
		 .entete{
            background:#16a085;
            text-align:center;
            color:#FFFFFF;
            }
		ul .dropdown-menu  {
		background-color:#000000;
		}
		ul .dropdown-menu a {
		outline:none;
		color:#FFFFFF;
		}
		.btn-vert{
        
            background-color:#16a085;
            border:none;
            border-radius:5px;
            font-size:18px;
            color:#FFF;
			padding:10px;
            }
    	.btn-vert:hover{
            
            background-color:#2ecc71;
            }	
		.mesBouton{
			margin-top:100px;
		}
		.ion-ios-telephone, .ion-printer{
			margin-right:10px;
		}
	ul .dropdown-menu  {
		background-color:#000000;
		}
	ul .dropdown-menu a {
		outline:none;
		color:#FFFFFF;
		}
    </style>
</head>

<body style="background-color:#F9F9F9">
	<nav class="navbar navbar-inverse navbar-fixed-top">
    	<div>
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
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
                    <a href="../include/deconnexion.php">
                         <span class="pe-7s-lock pe-2x" style="margin-right:5px;"></span>Déconnexion
                    </a>
                </li>
              </ul>
            </div>
        </div>
    </nav>
    <div class="container">
    	<?php if(!empty($errors)):?>
            <div class="alert alert-danger">
            	<h3>Vous n'avez pas rempli le formulaire correctement</h3>
                <ul>
                	<?php  foreach($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
            
        <section class="entete col-md-12 col-sm-12 col-xs-12">
            <h2>Création de nouvelle campagne</h2>
            <h4>Veuillez informer ces  champs</h4>
            <h5>Please inform these fields</h5>
        </section>
            
        <section class="row">
            <form action="ajouterCampagne.php" method="post" id="register_form">
                <aside class="col-md-5">
                	<div class="field ">
                        <label for="titre" class="field-label">Titre
                            <br><span style="font-size:12px">Title</span>
                        </label>
                      <input type="text" class="field-input" name="titre" id="titre" value="<?php if(isset($_POST['titre'])){ echo $_POST['titre'];}?>">
               		 </div>
                
                    <div class="field">
                        <label for="dateCampagne" class="field-label">Date
                            <br><span style="font-size:12px">Date</span>
                        </label>
                        <input type="date" class="field-input" name="dateCampagne" id="dateCampagne"
                        value="<?php if(isset($_POST['dateCampagne'])){ echo $_POST['dateCampagne'];}?>">
                    </div>
                    
                    <div class=" form-group" style="padding-top:40px;">
                    	<span style="color:#95a5a6;" >Type<br> 
                    	<span style="font-size:12px">Type</span>
                        </span>
                        <select name="type" id="type" class=" form-control">
                            <option value="1">Publique</option>
                            <option value="0">Privée</option>
                        </select>
               		</div>
                </aside>
                
                <aside class="col-md-5 col-md-offset-1">
                	<div class="field ">
                        <label for="adrExp" class="field-label">Adresse de l'expéditeur
                            <br><span style="font-size:12px">Expeditor's address</span>
                        </label>
                        <input type="mail" class="field-input" name="adrExp" id="adrExp" value="<?php if(isset($_POST['adrExp'])){ echo $_POST['adrExp'];}?>">
               		 </div>
                     
                     <div class="field ">
                        <label for="adrRep" class="field-label">Adresse de réponse
                            <br><span style="font-size:12px">Reply address</span>
                        </label>
                        <input type="mail" class="field-input" name="adrRep" id="adrRep" value="<?php if(isset($_POST['adrRep'])){ echo $_POST['adrRep'];}?>">
               		 </div>
                     
                     <div class=" form-group" style="margin-top:30px">
                            <label style="color:#95a5a6;" >Message<br> 
                                <span style="font-size:12px">Message</span>
                            </label>
                            <select name="id_message" id="id_message" class="form-control">
                            	<?php 
									require_once('../include/connexion.php');
									$req = $db->query('SELECT * FROM message WHERE type = 1 ORDER BY id DESC');
									while($donnee = $req->fetch()){
								?>
                                <option value="<?php echo ($donnee['id']);?>">
									<?php echo ($donnee['id']);?>
                                </option>
                                <?php 
									}
									$req->closeCursor();
								?>
                            </select>
               			 </div>
                </aside>
                
              <aside class="mesBouton col-md-5 col-md-offset-2">  
              		<button type="submit" class="btn-vert">Créer une campagne
                        <br> <span style="font-size:12px">Create campaign</span>
                    </button>
                    
                    <a onclick="return confirm('Voulez-vous vraiment Annuler cette action?');" href="accueilCampagne.php">
                        <button type="button" class="btn-rouge">Annuler
                            <br> <span style="font-size:12px">Cancel</span>
                        </button>
                    </a>
               </aside>
           </form>
        </section>
   </div>
	<?php 
		require_once('../include/piedPage.php');
	?>
<script src="../jquery.min.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script src="../../wysibb/Js/jquery.wysibb.min.js"></script>
<script src="../../wysibb/fr.js"></script>
<script>
	$(function($){
		$('.field-input').focus(function(){
			$(this).parent().addClass('is-focused has-label');
			})
			
		$('.field-input').blur(function(){
			$parent = $(this).parent();
			if($(this).val() == ''){
			$parent.removeClass('has-label');
		 	}
			
			$parent.removeClass('is-focused');
		})
	});
</script>
</body>
</html>