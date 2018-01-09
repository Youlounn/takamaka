<?php
	/*require_once"../include/session.php";
	if($prenom =="")
	{
		header("Location:../index.php");
	} */
	if(!empty($_POST))
	{
		require_once('../include/connexion.php');
		require_once('../include/fonctions.php');
		
		if(empty($_POST['titreCampagne']))
		{
			$errors['titreCampagne'] = "Vous n'avez pas saisi un titre de campagne";	
		}
		if(empty($errors))
		{
			$titreCampagne = mysql_real_escape_string(htmlentities($_POST['titreCampagne']));
			
			$req = $db->query('SELECT * FROM campagne WHERE titre LIKE "%'.$titreCampagne.'%"');
			$numRows = $req->rowCount();
			
		}
	}
		
?>


<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale=1.0"> 
	<link rel="shortcut icon" href="../../images/logo2.jpg"><title>Rechercher campagne</title>
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../Icon-font/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="../../Icon-font/pe-icon-7-stroke/css/helper.css">
    <link rel="stylesheet" href="../../ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../../fonts/Open_Sans/OpenSans-BoldItalic.ttf">
    <link rel="stylesheet" href="../../fonts/Arima_Madurai/ArimaMadurai-Regular.ttf">
    <link rel="stylesheet" href="../../mesBoutons.css">
  	
    <style>
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
			margin-top:70px
            }
			
	.navbar-nav a {
		outline:none;
		color:#FFFFFF;
		}
	
	ul .dropdown-menu {
		background-color:#27ae60;
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
	.detail:hover{
			color:#27ae60;
			cursor:pointer;
		}
	.detail{
		color:#2B5E9A;
		cursor:pointer;
		}
	footer{
			background:#080808;
			color:#FFF;
			border:2px solid #B3A569;
			}
	.monImage{
			width:100px;
			height:60px;
			margin:5px 0px;
		}
</style>
</head>

<body class="parallax">
	<div class="container"> 
    <?php 
		require_once('../include/entete.php');
	?>         
     	<div class="row">
        <div class=" col-md-12  col-sm-12 col-xs-12" style=" padding:0px;">
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
          
                    <div class="panel panel-success">
                        <table class="table table-responsive table-condensed table-bordered table-hover">
                          <?php
						  if(empty($errors))
						  {
								if($numRows > 0)
								{
							?>
                            <div class="panel-heading">
                                <h1 class="panel-title"> <b>Campagne(s)</b></h1>
                            </div>
                            <thead>
                                 <tr>
                                    <th>Nom</th>
                                    <th>Titre</th>
                                    <th>Adresse Expéditeur</th>
                                    <th>Adresse Réponse</th>
                                    <th>Date</th>
                                    <th>Messages</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
								while($donnee = $req->fetch())
									{
							?>
                                  <tr>
                                  	<td><?php echo ($donnee['nom']);?></td>
                                    <td><?php echo ($donnee['titre']);?></td>
                                    <td><?php echo ($donnee['adrExp']);?></td>
                                    <td><?php echo ($donnee['adrRep']);?></td>
                                    <td><?php echo ($donnee['date']);?></td> 
                                    <td><?php echo ($donnee['id_message']);?></td> 
                                  </tr><?php 
									  }	$req->closeCursor(); 
								   }else
									 {
							  ?>
                              		<tr class="errorSearch">
                                    	<td colspan="8" class="alert alert-danger">
                                        	Aucun resultat! No result!
                                        </td>
                                    </tr>
                              <?php 
									 }		
										$req->closeCursor();
						  }
								?>
                            </tbody>
                    	</table>
                    </div>
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
           <img src="../../images/logo-takamaka.jpg"class="img-thumbnail monImage" ><br>
           <strong class="text-muted" style="margin:10px 0px">TAKAMAKA &copy; <?php echo strftime('%d-%m-%Y');?></strong>
       </div>
   </footer>
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