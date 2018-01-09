<?php
	require_once('../include/session.php'); 
	if($prenom =="")
	{
		header("Location:../index.php");
	}
	require_once('../include/fonctions.php');
	require_once('../include/connexion.php');
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale=1.0"> 
	<link rel="shortcut icon" href="../../images/logo2.jpg"><title>Campagnes</title>
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../Icon-font/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="../../Icon-font/pe-icon-7-stroke/css/helper.css">
    <link rel="stylesheet" href="../../ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../../fonts/Open_Sans/OpenSans-BoldItalic.ttf">
    <link rel="stylesheet" href="../../fonts/Arima_Madurai/ArimaMadurai-Regular.ttf">
    <link rel="stylesheet" href="../mesBoutons.css">
   	
    <style>
	 body{
			background-color:#F9F9F9;
            font-size:16px;
          }
	tr th{
		text-align:center;
		}
	.field-label{
                position:relative;
                margin:0px;
                
                color:#7f8c8d;
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
                padding: 8px 5px;
                
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
                    background-color:#27ae60;
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
	
	@font-face{ font-family:open-sans; font-family:Arima_Madurai
		}
	
	.search{
		padding:5px;
		border: solid 3px #2ecc71;
		border-radius:40px;
		outline:none;
		width:30px;
		padding-left:20px;
		background: url(../../images/search.png) right no-repeat;
		transition: width 2s;
		-webkit-transition: width 2s;
		-moz-transition: width 2s;
		-o-transition: width 2s;
		-ms-transition: width 2s;
		}
	
	
	.search:focus{
		width:200px;
		}
	
	.btn-success a:hover{
		text-decoration:none;
		color:#FFF;
		}
	
	.ajouter{
		margin:15px;
		}
		
	.container{
            border:1px solid #27ae60;
            box-shadow:3px 3px 6px #27ae60;
            padding-bottom:15px;
			margin-bottom:15px;
			background:#FFFFFF;
			margin-top:65px;
            }
			
	.navbar-nav a {
		outline:none;
		color:#FFFFFF;
		}
	
	.chemin{
		text-decoration:none; 
		}
		
	.chemin a:hover{
			color:#27ae60;
		}
	.btn-vert1{
        
            background-color:#27ae60;
            border:none;
            border-radius:5px;
            font-size:18px;
            color:#FFF;
            }
    .btn-vert:hover{
            
            background-color:#2ecc71;
            }	
			
	.statistique{
		font-size:18px;
		}
	.statistique2{
		font-size:18px;
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
	<div class="container">
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
                <li ><a href="#bibliotheque" data-toggle="dropdown">Bibliothèque </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Messages</a></li>
                        <li><a href="#">Mailing</a></li>
                    </ul>
                </li>
                <li class="active"><a href="../campagne/accueilCampagne.php">Gestion des campagnes</a></li>
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
    
    <div class="row">
    	<div class="col-md-12 col-sm-12 col-xs-12"  style=" padding:5px 10px">
       	  <form action="../recherches/rechercherCampagne.php" method="post" class="pull-right">
          	<input type="text" name="titreCampagne" class="search" id="titreCampagne" placeholder="Titre de la campagne...">
            
            <span>
               		<button type="submit" value="rechercher" class=" btn btn-success"> Rechercher</button>
            </span>
           </form>
        </div>
    </div>
          
     	<div class="row">
            <div class="ajouter">
            <?php 
				//if($statut == 'administrateur')
				{		
			?>
                <a href="ajouterCampagne.php">
                	<button class="btn-vert1" style="width:200px; outline:none">
                   Créer une campagne <br> <i class="pe-7s-plus pe-2x "></i>
                	</button>
                </a>
           
             <span class="pull-right statistique2" style="padding-right:0px">
                    Nombre de campagne(s) <span class="badge" style="background:#1abc9c; color:#FFF"><?php echo nbCampagne();?>
                  <sup><i  class="pe-7s-medal pe-2x"></i></sup></span>                     
             </span>
               <!--<a data-toggle="modal" href="#bailleur">
                	<button class="btn-vert " style="width:200px; outline:none">
                    Formation & bailleurs <br>
                       <i class="pe-7s-link pe-2x"></i>
              		</button> 
                </a>-->
            <?php 
				}
			?>
</div>  
<hr style="margin: 5px 0px 2px 0px;">
        <div class=" col-md-12  col-sm-12 col-xs-12" style=" padding:0px;">
                    <div class="panel panel-success">
                        <table class="table table-responsive table-condensed table-bordered table-hover">
                            <div class="panel-heading">
                                <h1 class="panel-title"> <b>Campagnes</b></h1>
                            </div>
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Titre</th>
                                    <th>Adresse Expéditeur</th>
                                    <th>Adresse Réponse</th>
                                    <th>Date</th>
                                    <th>Messages</th>
                                    <?php 
										//if($statut == 'administrateur')
										{		
									?>
                                    <th>Supprimer</th>
                                    <th>Modifier</th>
                                    <?php 
										}
									?>  
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
									if(isset($_GET['page']))
									{
										$page = $_GET['page'];
									}else
									{
										$page = 0;
									}
									$size = 10;
									$offset = $page*$size;
									$nombreCampagne = nbCampagne();
									if($nombreCampagne % $size == 0) $nombrePage = floor($nombreCampagne/$size);
									else $nombrePage = floor($nombreCampagne/$size) + 1;
									 
									if( isset($_GET['page']) && ($_GET['page'] > $nombrePage)) 
									{
										$page = 0;
										$size = 10;
										$offset = $page*$size;
										$nombreCampagne = nbCamapgne();
										if($nombreCampagne % $size == 0) $nombrePage = floor($nombreCampagne/$size);
										else $nombrePage = floor($nombreCampagne/$size) + 1;
									}
									$req = $db->query('SELECT * FROM campagne  ORDER BY id DESC LIMIT ' .$size. 
										' OFFSET '.$offset);
									while($donnee = $req->fetch()){
								?>
                                <tr>
                                    <td><?php echo ($donnee['nom']);?></td>
                                    <td><?php echo ($donnee['titre']);?></td>
                                    <td><?php echo ($donnee['adrExp']);?></td>
                                    <td><?php echo ($donnee['adrRep']);?></td>
                                    <td><?php echo ($donnee['date']);?></td> 
                                    <td><?php echo ($donnee['id_message']);?></td> 
                                <?php 
									//if($statut == 'administrateur')
									{		
								?>
                                    <td  style="text-align:center">
                                    	<a onclick="return confirm('Voulez-vous vraiment envoyer cette campagne à la corbeille?');"
                                          href="supprimerCampagne.php?id=<?php echo ($donnee['id']);?>">
                                    		<img src="../../images/sup.jpg" alt="Supprimer" width="40" height="30">
                                    	</a>
                                    </td>
                                    <td  style="text-align:center">
                                    	<a href="modifierCampagne.php?id=<?php echo ($donnee['id']);?>">
                                        	<img src="../../images/edit.jpg" alt="Modifier" width="30" height="30">
                                        </a>
                                    </td>
                                <?php 
									}
								?>  
                                </tr>
                             <?php 
									}
									$req->closeCursor();
								?>
                            </tbody>
                    	</table>
                    </div>
                  <div class="pagination" style="margin-left:100px">
                    	<ul class="nav nav-pills">
                        	<?php for($i=0;$i<$nombrePage;$i++)
								{
							?>
                            		<li style="background-color:<?php echo(($i==$page)?'#27ae60':'');?>">
										<a href="accueilCampagne.php?page=<?php echo($i);?>"> <?php echo($i);?></a>
                                    </li>
                            <?php 
								}
							?>
                        </ul>
                    </div>
        </div>
		</div>   
    </div> 

<?php include("../include/piedPage.php");?>

<script src="../jquery.min.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script>
	$(function($){
		$('.search').blur(function(){
			if($(this).val() != ''){
				$(this).css('width', '200');
				}
			});				
			
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