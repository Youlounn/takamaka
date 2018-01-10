<?php
	$idMailing = $_GET['id'];
	require_once("../include/connexion.php");
	$req =$db->prepare('SELECT * FROM mailing WHERE id = ?');
	$req->execute([$idMailing]);
	$mailing = $req->fetch();

?>

<!doctype html>
<html>
<head>
	<link rel="shortcut icon" href="../../images/logo2.JPG"><title>Nouvelle campagne</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Icon-font/assets/Pe-icon-7-stroke.css">
    <link rel="stylesheet" href="../../Icon-font/pe-icon-7-stroke/css/helper.css">
    <link rel="stylesheet" href="../../font-awesome/css/font-awesome.css">
     <link rel="stylesheet" href="../../ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../../animate.css">
    <link rel="stylesheet" href="../mesBoutons.css">

    <style>
	h3{
		font-family:Constantia, 'Lucida Bright', 'DejaVu Serif', Georgia, serif;  font-weight:bold;
		display:inline-block;
	}
    body{
		background:url(../../images/logo-takamaka.jpg);
		background-repeat:no-repeat;
		background-size:cover;
	}
	.confirmation{
		margin-top: 15px;
		box-shadow:-1px 3px 3px #1abc9c;
		background:#FFFFFF;
		border:2px solid #1abc9c;
		opacity:0.9;
	}

	.titre{
		text-align:center;
		color:#27ae60;

	}
	.logo{
		width:200px;
		height:60px;
		margin-left:10px;
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

	.ajoutercampagne{
		margin:5px;}

    </style>

</head>

<body>

 	<div class="confirmation col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
        <span class="pull-right ajoutercampagne" >
        	<a href="accueilMailling.php">
           	   <button class="btn-vert"><i class="pe-7s-back pe-2x"></i>Retourner </button>
            </a>
        </span>
        <?php
			if($mailing)
			{
		?>
            <h3 class="titre">Le mailing a été créée</h3>

                <div class="contenu col-sm-12 col-xs-12" style=" padding:0px;">
                    <div class="panel panel-success">
                        <table class="table table-responsive table-condensed table-hover table-bordered">
                            <div class="panel-heading">
                                <h3 class="panel-title" > <b>Le nouveau mailing</b></h3>
                            </div>
                            <thead>
                                <tr>
                                    <th>Campagne associée</th>
                                    <th>Type</th>
                                    <th>Champ1</th>
                                    <th>Champ2</th>
                                    <th>Champ3</th>
                                    <th>Champ4</th>
                                    <th>Champ5</th>
                                    <th>Champ6</th>
                                    <th>Champ7</th>
                                    <th>Champ8</th>

                                </tr>
                            </thead>
                            <tbody>
								<tr>
									<td><?php echo $mailing['id_campagne']; ?></td>
                  <td><?php if($mailing['type'] == 0){echo "privé";}else{echo "public";} ; ?></td>
									<td><?php echo $mailing['champ1']; ?></td>
									<td><?php echo $mailing['champ2']; ?></td>
									<td><?php echo $mailing['champ3']; ?></td>
									<td><?php echo $mailing['champ4']; ?></td>
									<td><?php echo $mailing['champ5']; ?></td>
									<td><?php echo $mailing['champ6']; ?></td>
									<td><?php echo $mailing['champ7']; ?></td>
									<td><?php echo $mailing['champ8']; ?></td>
								</tr>

						<?php
							}
							else{
							 ?>
                             	<table class="table">
									<tr align="center">
										<td class=" alert alert-danger" style="font-size:18px; color:red">
											<span >Aucune campagne correspondant à ces informations! </span>
										</td>
								   </tr>
                                </table>
							 <?php
								 }
								 $req ->closeCursor();
							 ?>
                            </tbody>
                    	</table>
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
   <script src="../../jquery.min.js"></script>
   <script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
