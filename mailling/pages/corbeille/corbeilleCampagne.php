<em><em><?php
	/*require_once('../include/session.php'); 
	if($prenom =="")
	{
		header("Location:../index.php");
	}*/
	require_once('../include/fonctions.php');
	require_once('../include/connexion.php');
	$req = $db->query('SELECT * FROM corbeillecampagne');
	$numRows = $req->rowCount();
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
			margin-top:90px;
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
</style>
</head>

<body style="background-color:#F9F9F9">
	<div class="container">
 	<?php 
		require_once('../include/entete.php');
	?>
    
     	<div class="row">
		<hr style="margin: 5px 0px 2px 0px;">
        <div class=" col-md-12  col-sm-12 col-xs-12" style=" padding:0px;">
        <?php 
			if($numRows > 0 )
			{
		 ?>
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
                                    <th>Restareurer</th>
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
									$req = $db->query('SELECT * FROM corbeillecampagne  ORDER BY id DESC LIMIT ' .$size. 
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
                                    	<a onclick="return confirm('Voulez-vous vraiment restaurer cette campagne ?');"
                                          href="../campagne/restaurerCampagne.php?id=<?php echo ($donnee['id']);?>">
                                    		<i class="pe-7s-refresh-2 pe-2x" ></i>
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
										<a href="../campagne/accueilBailleur.php?page=<?php echo($i);?>"> <?php echo($i);?></a>
                                    </li>
                            <?php 
								}
							?>
                        </ul>
                    </div>
                <?php 
					}else
                      {
                 ?>
                          <table class="table">
                              <tr class="errorSearch">
                                  <td colspan="8" class="alert alert-danger">
                                       La corbeille est vide! The trash is empty!
                                  </td>
                              </tr>
                          </table>
                 <?php 
                       }$req ->closeCursor();		
                 ?>
        </div>
		</div>   
    </div> 

<?php include("../include/piedPage.php");?>

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

	//on verifie si le bailleur n'est fait pas partir des bailleurs de la formation	
	$("#projet").blur(function(){
		check_bailleur();
	});
	
});
</script>
</body>
</html></em></em>