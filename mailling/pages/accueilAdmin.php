<?php
	require_once"include/session.php";
	if($prenom =="")
	{
		header("Location:index.php");
	}
	require_once('include/connexion.php');
	require_once('include/fonctions.php');
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale=1.0">
	<title>Accueil Administration</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Icon-font/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="../Icon-font/pe-icon-7-stroke/css/helper.css">
    <link rel="stylesheet" href="../ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="mesBoutons.css">

    <style>
	@font-face{ font-family:open-sans; font-family:Arima_Madurai
		}

	.search{
		padding:5px;
		border: solid 3px #2ecc71;
		border-radius:40px;
		outline:none;
		width:60px;
		padding-left:10px;
		background: url(../images/search.png) right no-repeat;
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
	#search1::before{
		content:'DE ';
		padding:0px 5px;
	}

	#search2::before{
		content:'A';
		padding: 0px 5px;
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
            }

	.chemin{
		text-decoration:none;
		}

	.chemin a:hover{
			color:#27ae60;
		}

	.statistique{
		font-size:18px;
		}
	.statistique2{
		font-size:18px;
		}

	td a{
		color:#000000;
		}
	td a:hover{
		color:#27ae60;
		text-decoration:none;
		}
	.rechercher{
		margin-right:15px;
		margin-bottom: 10px;
		margin-top: 5px;
		height:30px;
	}
	.rechercher button{
		padding:5px 10px;

	}
	.ion-ios-telephone, .ion-printer{
			margin-right:10px;
		}
		.monImage{
			width:100px;
			height:55px;
			margin:5px 0px;
		}

		footer{
			background: #080808;
			color:#FFFFFF;
			border:2px solid #B3A569;
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

<body style=" margin-top:63px;" class="parallax3">
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
             	  <img src="../images/bienvenue6.jpg"alt="Bienvenue" width="90" height="60">
               </span>
               <span class="bienvenuUser" style="padding-top:-12px; padding-right:20px; border-right:solid #FFFFFF; padding:20px; color:#FFFFFF"> <?php echo $prenom;?> &nbsp;&nbsp; <?php echo $nom;?>
               </span>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#bibliotheque" data-toggle="dropdown">Bibliothèque </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Messages</a></li>
                        <li><a href="../mailling/accueilMailling.php">Mailing</a></li>
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
    	<div class="row">

    </div>
	<span class="pull-right statistique2" style="padding-right:0px">
          Nombre de campagne(s) <span class="badge" style="background:#1abc9c; color:#FFF"><?php echo nbCampagne();?>
    <sup><i  class="pe-7s-medal pe-2x"></i></sup></span>
             </span>
     <hr style="margin-bottom:0px">
     	<div class="row" >
           <div class="ajouter" style="margin-left:200px">
           	    <a href="Formation/accueilFormation.php">
                	<button class="btn-vert " style="width:200px; outline:none">
                    Formations <br> <i class="pe-7s-medal pe-3x "></i>
                	</button>
                </a>
                <a href="Mission/accueilMission.php">
                	<button class="btn-vert " style="width:200px; outline:none">
                    Missions<br>
                       <i class="pe-7s-notebook pe-3x"></i>
              		</button>
                </a>
                <a href="Bureau/accueilBureau.php">
                	<button class="btn-vert " style="width:200px; outline:none">
                    Administration  <br>
                       <i class="pe-7s-portfolio pe-3x"></i>
              		</button>
                </a>
                <a href="stagiaire/accueilStagiaire.php">
                	<button class="btn-vert " style="width:200px; outline:none">
                    Stagiaires <br>
                       <i class="pe-7s-study pe-3x"></i>
              		</button>
                </a>
           </div>
    	</div>
     </div>

 <footer class=" col-md-12 col-sm-12 col-xs-12" style="position:absolute; bottom:0px;">
        <div class=" col-md-6 col-sm-6 col-xs-6">
          <i>
              TAKAMAKA Prod <br>
              B.P : Rennes 35700 <br>
              <i class="ion-ios-telephone"></i>0033 96 00 64 41 <br>
              <i class="ion-printer"></i>0033 33 62 64 93
          </i>
       </div>

       <div class=" col-md-2 col-md-offset-4 col-sm-6 col-xs-6">
           <img src="../images/logo-takamaka.jpg"class="img-thumbnail monImage" ><br>
           <strong class="text-muted" style="margin:10px 0px">TAKAMAKA &copy; <?php echo strftime('%d-%m-%Y');?></strong>
       </div>
   </footer>

<script src="jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script>
	$(function($){
		$('.search').blur(function(){
			if($(this).val() != ''){
				$(this).css('width', '200');
				}

			});
	});
</script>
</body>
</html>
