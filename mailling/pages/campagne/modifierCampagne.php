<?php 
	$idCampagne = $_GET['id'];
	require_once('../include/connexion.php');
	$req = $db->prepare('SELECT * FROM campagne WHERE id = ?');
	$req->execute(array($idCampagne));
	$campagne = $req->fetch();
?>

<?php 
	if(!empty($_POST))
	{
		$errors =array();
			// Traitement si'il n'y a pas d'erreurs
		if(empty($errors))
		{
			$req = $db->prepare("UPDATE campagne SET titre = ?, nom = ?, date = ?, adrRep = ?, adrExp = ?, type = ?, id_message = ?
			 WHERE id = ?"); 
			$req->execute(array($_POST['titre'], $_POST['nomCampange'], $_POST['dateCampagne'], $_POST['adrRep'], $_POST['adrExp'], $_POST['type'], 
			$_POST['id_message'], $_POST['idCampagne']));
						
			$idCampagne = $_POST['idCampagne'];
			header("Location:finModifierCampagne.php?id=$idCampagne");
		}
	}	
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale=1.0"> 
    <link rel="shortcut icon" href="../../images/logo-takamaka.jpg"><title>Modification</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Icon-font/assets/Pe-icon-7-stroke.css">
    <link rel="stylesheet" href="../../font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../mesBoutons.css">
    <style>
        body{
            font-size:16px;
            color:#212121;
            padding:20px;
			background-color:#F9F9F9;
            }
            
        label{
			color:#7f8c8d;
			}
		label span{
			font-size:12px;
			}
               
        .entete{
            background:#27ae60;
            text-align:center;
            color:#FFFFFF;
            margin:0px;
            }
		.btn-vert{
        
            background-color:#27ae60;
            border:none;
            border-radius:5px;
            font-size:18px;
            color:#FFF;
			padding:10px;
            }
    	.btn-vert:hover{
            
            background-color:#2ecc71;
            }	
        .container{
            border:1px solid #27ae60;
            box-shadow:3px 2px 6px #27ae60;
            padding-bottom:15px;
			background-color:#FFF;
            }
			
		.entete img {
			width:120px;
			height:60px;
			padding:5px 5px;
			box-shadow:4px 3px 4px #ecf0f1}
    </style>
</head>

<body class="parallax3">
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
            <section class="entete">
            	<span class="pull-left">
                 <img src="../../images/logo-takamaka.jpg" alt="" class="img-rounded">
                </span>
                <h2>Page de modification d'une campagne</h2>
                <h4>Veuillez apporter les modifications</h4>
                <h6>Please inform these different fields.</h6>
            </section>
            
      <section class="row">
      <?php 
			if($campagne)
			{
		?>
       	 <form method="post" enctype="multipart/form-data">
            	<div class="form-group">
                	<input type="text" class="hidden form-control" name="idCampagne" id="idCampagne" 
                	value="<?php echo ($campagne['id']);?>">
               	</div>
                
                <div class="form-group  col-md-5">
                    <label for="nomCampange" >Nom 
                    	<br><span>Name</span>
                    </label>
                    <input type="text" class=" form-control" name="nomCampange" id="nomCampange" value="<?php echo ($campagne['nom']);?>">
               	</div>
                
                <div class="form-group  col-md-5 col-md-offset-1">
                    <label for="titre" >Titre 
                    	<br><span>Title</span>
                    </label>
                    <input type="text" class=" form-control" name="titre" value="<?php echo ($campagne['titre']);?>">
               	</div>
                
                <div class="form-group  col-md-5">
                    <label for="dateCampagne" >Date 
                    	<br><span>Date</span>
                    </label>
                    <input type="text" class=" form-control" name="dateCampagne" id="dateCampagne" value="<?php echo ($campagne['date']);?>">
               	</div>
                <div class="form-group  col-md-5 col-md-offset-1">
                    <label for="titre" >Type 
                    	<br><span>Type</span>
                    </label>
                    <input type="text" class=" form-control" name="type" id="type" value="<?php echo ($campagne['type']);?>">
               	</div>
                <div class="form-group  col-md-5">
                    <label for="titre" >Adresse expéditeur 
                    	<br><span>Expeditor's address</span>
                    </label>
                    <input type="mail" class=" form-control" name="adrExp" id="adrExp" value="<?php echo ($campagne['adrExp']);?>">
               	</div>
                
                <div class="form-group  col-md-5 col-md-offset-1">
                    <label for="titre" >Adresse de réponse 
                    	<br><span>Reply address</span>
                    </label>
                    <input type="mail" class=" form-control" name="adrRep" id="adrRep" value="<?php echo ($campagne['adrRep']);?>">
               	</div>
                 
                 <div class=" form-group col-md-5">
                      <span for="id_message" style="color:#95a5a6;">Choisir la message <br> 
                        <span style="font-size:12px">Select message</span></span>
                       <select name="id_message" id="id_message" class=" form-control">
                            <option value="<?php echo ($campagne['id_message']);?>">Message actuel</option>
                              <?php 
                                require_once('../include/connexion.php');
                                $req = $db->query('SELECT * FROM message WHERE type = 1 ORDER BY id DESC');
                                while($donnee = $req->fetch()){
                                ?>
                               <option value="<?php echo ($donnee['id_message']);?>">
                                    <?php echo ($donnee['id']);?>
                               </option>
                              <?php 
                                }
                                    $req->closeCursor();
                              ?>
                      </select>
              	</div>
                 
                 <div class="col-md-5 col-md-offset-2" >       
                    <button type="submit" class="btn-vert">Enregistrer
                        <br><span style="font-size:12px">Save</span>
                    </button>
                    
                    
                    <a onclick="return confirm('Voulez-vous vraiment Annuler cette action?');" href="accueilCampagne.php?">
                    <button type="button" class="btn-rouge">Annuler
                        <br> <span style="font-size:12px">Cancel</span>
                    </button>
                     </a>
            	</div>
         </form> 
          <?php 
				  }else
				   {
			  ?>
              	<table class="table">
					<tr align="center">
						<td colspan="4" class="alert alert-danger">
							Aucune campagne ne correspond à ces informations!
						</td>
                        <td>
                            <span class="pull-right ajouterbailleur" >
                                <a href="accueilCampagne.php">
                                   <button class="btn-vert"><i class="pe-7s-back pe-2x"></i><br>Retourner </button>
                               </a>
                            </span>
                        </td>
					</tr>
                </table>
			  <?php 
				   }	
				   $req ->closeCursor();
			  ?>
     </section>
</div>
<script src="../../jquery.min.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
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