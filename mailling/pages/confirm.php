<?php 
	$iduser = $_GET['id'];
	require_once'include/connexion.php';
	$requete1 = $db->prepare('SELECT * FROM utilisateur WHERE id = ?');
	$requete1->execute(array($iduser));
	$user = $requete1->fetch();
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../images/logo2.jpg"><title>Confirmation</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Icon-font/assets/Pe-icon-7-stroke.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../animate.css">
    <link rel="stylesheet" href="../mesBoutons.css">
    
    <style>
	.confirmation{
		margin-bottom: 15px;
		box-shadow:-1px 3px 3px #16a085;
		background:#FFFFFF;
		border:2px solid #1abc9c; 
	}
	
	.titre{
		text-align:center;
		color:#1abc9c;
		
	}
	.logo{
		width:200px;
		height:60px;
		margin-left:10px;				
	}
	
	body{
		font-size:16px}
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
    </style>

</head>
<body class=" parallax2">
	<div class="row">
    	<img src="../images/logo-takamaka.jpg" alt="logo" class="pull-left logo img-rounded"> 
    </div> 
 	<div class="confirmation col-md-6 col-sm-12 col-xs-12 col-md-offset-3">
        <h3 class="titre">Confirmation de compte</h3>
        <p>
        	Bienvenu sur : Takamaka e-Mailing- <i>Welcome to Takamaka e-Mailing.</i>
            </br>
             <span style=" padding-left:200px; color:#093">The e-mailing reference platform</span>
        </p>
        <?php 
			if($user){
		?>	
        				<hr>
                        <p>Salut <span class="userInformation">	<?php  echo $user['nom'];?> </span>!  <br>
                            Dernière étape de votre inscription, un email de confirmation vous a été envoyé à l'adresse : 
                            <span class="userInformation">	<?php echo $user['email'];?> </span>.
                            <br> <strong class="pull-right">Merci de vérifier votre courrier et de cliquer sur le lien!</strong>
                        </p>
      		<?php 
				}
				else
					{
			?>  
            	<table class="table">
                	<tr class="errorSearch">
                    	<td class="alert alert-danger">Aucun compte ne correspond à ces informations! No account for this
                         informations!</td>
                    </tr>
                </table>
            <?php 
					}
				
			?>  
      
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
</body>
</html>