<?php
	$idMailing = $_GET['id'];
	require_once('../include/connexion.php');
	$req = $db->prepare('SELECT * FROM mailing WHERE id = ?');
	$req->execute(array($idMailing));
	$mailing = $req->fetch();
?>

<?php
	if(!empty($_POST))
	{
		$errors =array();
			// Traitement si'il n'y a pas d'erreurs
		if(empty($errors))
		{
			$req = $db->prepare("UPDATE mailing SET contenu = ? WHERE id = ?");
			$req->execute(array($_POST['contenu'], $_POST['idMailing']));

			$idMailing = $_POST['idMailing'];
			header("Location:accueilMailling.php");
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
    <link rel="stylesheet" href="../../wysibb/css/wbbtheme.css">
    <link rel="stylesheet" href="../../wysibb/fonts/wysibbiconfont-wb.eot">
    <link rel="stylesheet" href="../../wysibb/fonts/wysibbiconfont-wb.ttf">
    <link rel="stylesheet" href="../../wysibb/fonts/wysibbiconfont-wb.woff">
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
                <h2>Page de modification d'un message</h2>
                <h4>Veuillez apporter les modifications</h4>
                <h6>Please inform these different fields.</h6>
            </section>

      <section class="row">
      <?php
			if($message)
			{
		?>
       	 <form method="post" enctype="multipart/form-data">
            	<div class="form-group">
                	<input type="text" class="hidden form-control" name="idMessage" id="idMessage"
                	value="<?php echo ($message['id']);?>">
               	</div>

                <div class="form-group  col-md-9">
                    <label for="contenu" >Message
                    	<br><span>Message</span>
                    </label>
                    <textarea name="contenu" id="contenu" rows="10" cols="30">
                    	<?php echo ($message['contenu']);?>
                    </textarea>
               	</div>

                 <div class="col-md-3 col-md-offset-8" >
                    <button type="submit" class="btn-vert">Enregistrer
                        <br><span style="font-size:12px">Save</span>
                    </button>


                    <a onclick="return confirm('Voulez-vous vraiment Annuler cette action?');" href="../message/accueilmessage.php?">
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
							Aucun message ne correspond à ces informations!
						</td>
                        <td>
                            <span class="pull-right ajouterbailleur" >
                                <a href="accueilMessage.php">
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
		// Editeur Wysibb

		  $(function() {
		  $("#contenu").wysibb();
		})
		  var wbbOpt = {
		  lang: "fr"
		 }
		 $("#contenu").wysibb(wbbOpt);
	});
</script>
</body>
</html>
