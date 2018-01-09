<?php 
	require_once("include/fonctions.php");
	if(!empty($_POST))
	{
		require_once("include/connexion.php");
		$errors = array();
			if(empty($_POST['nom']))
			{
				$errors['nom']= "Vous n'avez pas saisi de nom!";
			}
			if(empty($_POST['prenom']))
			{
				$errors['prenom']= "Vous n'avez pas saisi de prénom!";
			}
			if(empty($_POST['type']))
			{
				$errors['type']= "Vous n'avez pas choisi de type d'utilisateur!";
			}
			
			if(empty($_POST['email']) ||!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
			{
				$errors['email'] = "Adresse email invalide!";
			} else{
					//Connexion à la base
					$email = $_POST['email'];
					 require("include/connexion.php");
					 $q = $db->prepare('SELECT id FROM utilisateur WHERE email = ?');
					 $q->execute(array($email));
					 
					 $numRows = $q->rowCount();
					 if($numRows >0)
					 {
						$errors['email'] = "Adresse email déjà utilisée!";
					 }
			       }
			if(empty($_POST['pass1']) || $_POST['pass1'] != $_POST['pass2']){
				$errors['pass1'] = "Les deux mots de passe doivent être identiques";
			}
					
	if(empty($errors))
	{
		$nom = $_POST['nom'];
		$email = $_POST['email'];
		$pass = $_POST['pass1'];
		$password = sha1($_POST['pass1']);
		
		$req = $db->prepare("INSERT INTO utilisateur SET nom = ?, prenom = ?, email = ?, mdp = ?, type = ?");
		
		$req->execute(array($_POST['nom'], $_POST['prenom'], $email, $password, $_POST['type']));
		
		$user_id = $db->lastInsertId();
		
		$to = $email;
		$from = "auto-responder@Takamaka.com";
		$subject = "Takamaka : Activation de votre compte";
		$message = "<!doctype html>
					<html>
						<head>
							<meta charset=\"utf-8\">
						</head>
					<body>
					Salut $nom,<br/><br/>
					Completez cette dernière étape pour activer votre compte chez <strong> AfricaRice</strong>.
					<p>Pour se faire, il suffit de cliquer sur le lien suivant:<br/>
				http://localhost/Africarice//pages/confirmation.php?id=$user_id&token=$token&email=$email&pseudo=$pseudo<br/>
					Si l'url n'apparrait pas comme un lien actif, veuillez copier/Coller ce dernier dans la barre d'adresse de 
					votre navigateur internet.</p>
					</h2>Identifiants de connexion</h2>
					<p>
					Pseudo - Nom d'utilisateur : $mail<br/>
					Mot de passe : $pass,
					</p>
					<p>Rendez-vous sur le site AfricaRice
						<a href=\"http://localhost/mailing//pages/index.php\">Takamaka</a></p>
					</body>
					</html>";
		$headers = "From: $from\n";
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-type: text/html; charset =iso-8859-1\n";
		if(mail($to,$subject,$message,$headers))
		{
			header("Location:confirm.php?id=$user_id");
		}
		else
		{
			$q = $db->prepare('DELETE FROM utillisateur WHERE id =?');
			$q->execute(array($user_id));
			header("Location :sendError.php?");
		}
			exit();
	}				
  }
?>
  
<!doctype html> 
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo2.jpg"><title>Créer compte</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Icon-font/assets/Pe-icon-7-stroke.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../animate.css">
	<link rel="stylesheet" href="mesBoutons.css">
    <style>
			
        body{
            font-size:16px;
            color:#212121;
			background-color:#F9F9F9;
            }
            
        .field{
                position:relative;
                height:77px;
                padding: 16px 0px 8px 0px;
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
                padding: 8px Opx;
                
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
            
        .entete{
            background:#16a085;
            text-align:center;
            color:#FFFFFF;
            margin:0px;
            }
		
		.entete img {
			width:120px;
			height:60px;
			padding:5px 5px;
			box-shadow:4px 3px 4px #ecf0f1;
			}
			
        .container{
			background-color:#FFFFFF;
            border:1px solid #16a085;
            box-shadow:3px 2px 6px #16a085;
            padding-bottom:15px;
            }
		
		.mesBouton{
			padding-top:70px;}
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
                 	<img src="../images/logo-takamaka.jpg" alt="" class="img-rounded">
                </span>
                <h2>Création de compte utilisateur</h2>
                <h4>Veuillez renseigner ces différents champs</h4>
                <h6 >Please inform these different fields</h6>
            </section>
            
        <section class="row" id="formulaire">
            <form id="register_form" method="post" enctype="multipart/form-data" action="creerCompte.php">
                <aside class="col-md-5">
                        <div class="field ">
                            <label for="nom" class="field-label">Nom
                                <br><span style="font-size:12px">Name</span>
                            </label>
                            <input type="text" class="field-input" name="nom" id="nom"
                            value="<?php if(isset($_POST['nom'])){ echo $_POST['nom'];}?>">
                        </div>
                        
                        <div class="field">
                            <label for="prenom" class="field-label">Prénom
                                <br><span style="font-size:12px">First name</span>
                            </label>
                            <input type="text" class="field-input" name="prenom" id="prenom"
                            value="<?php if(isset($_POST['prenom'])){ echo $_POST['prenom'];}?>">
                        </div>
                    
                    <div class="field">
                        <label for="email" class="field-label">Email
                            <br><span style="font-size:12px">E-mail
                        </label>
                        <input type="email" class="field-input" name="email" id="email"
                        value="<?php if(isset($_POST['email'])){ echo $_POST['email'];}?>">
                        <small id="output_email"></small>
                    </div>
                    	
                </aside>
                
                 <aside class="col-md-5 col-md-offset-1">
                     <div class="field">
                        <label for="pass1" class="field-label">Mot de passe
                            <br><span style="font-size:12px">Password</span>
                        </label>
                    	<input type="password" class="field-input" name="pass1" id="pass1" >
                        <small id="output_pass1"></small>
                	</div>
                          
                     <div class="field">
                        <label for="pass2" class="field-label">Confirmer le mot de passe
                            <br><span style="font-size:12px">Confirm password</span>
                        </label>
                        <input type="password" class="field-input" name="pass2" id="pass2" >
                        <small id="output_pass2"></small>
                     </div> 
                    
                    <div class=" form-group" style="padding-top:30px;">
                    	<label style="color:#95a5a6;" >type d'utilisation<br> 
                    	<span style="font-size:12px">User Status</span>
                        </label>
                        <select name="type" id="type" class=" form-control" required>
                            <option value="1">Administrateur</option>
                            <option value="2">Gestionnaire</option>
                        </select>
               		</div> 
                    
                    <aside class="mesBouton  pull-right"> 
                        <button type="submit" class="btn-vert">Créer mon compte
                               <br> <span style="font-size:12px">Create account</span>
                        </button>      
                        
                        <a onclick="return confirm('Voulez-vous vraiment Annuler cette action?');" href="index.php">
                            <button type="button" class="btn-rouge">
                           		 Annuler<br> <span style="font-size:12px">Cancel</span>
                        	</button>
                        </a>
             		</aside>
              	</aside> 
          </form>
        </section>
    </div>
<script src="jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script>
	$(function($){
		$('.field-input').focus(function(){
			$('#status').fadeOut(800);
			$(this).parent().addClass('is-focused has-label');
			});
			
		$('.field-input').blur(function(){
			$parent = $(this).parent();
			if($(this).val() == ''){
			$parent.removeClass('has-label');
		 	}
			
			$parent.removeClass('is-focused');
		});
		
		$("#pseudo").keyup(function(){
			//on verifie si le pseudo est Ok ou n'a pas été pris par un membre 
			check_pseudo();
		});
		
		$("#pass1").keyup(function(){
			//on verifie si le mot de passe est Ok 
			if($("#pass1").val().length < 6)
			{
				$("#output_pass1").css("color", "red").html("<br/> Trop court (6 caractères minimuim)");
			}else if($("#pass2").val() != "" && $("#pass2").val() != $("#pass1").val())	
				{
					$("#output_pass1").html("<br/>Les deux mots de passe sont différents");
					$("#output_pass2").html("<br/>Les deux mots de passe sont différents");	
					
				}else 
				{
					$("#output_pass1").html('<img src="../images/ok.jpg" class="small_image" alt="Ok" width="20px" 		        	 						height="20px"/>').css('float', 'right').css('display', 'inline');
				}
			
		});
		
		$("#pass2").keyup(function(){
			//on verifie si les mots de passe coincident 
			check_password();
		});
		
		$("#email").keyup(function(){
			//on verifie si l'email n'est pas déjà utilisé 
			check_email();
		});
		
    });
	
function check_pseudo()
{
	$.ajax(
	{
		type:"post",
		url:"registerCompte.php",
		data: {
				'pseudo_check' : $("#pseudo").val()
			  },
			
			success: function(data)
			{
				if(data == "success")
				{
					$("#output_checkuser").css('float', 'right').html('<img src="../images/ok.jpg" class="small_image" alt="Ok" width="20px" height="20px"/>');
					return true;
				}else 
					  {
							$("#output_checkuser").css("color", "red").html(data);
					  }
			}
	});
}

function check_password()
{
	$.ajax(
	{
		type:"post",
		url:"registerCompte.php",
		data:{
			'pass1_check': $("#pass1").val(),
			'pass2_check': $("#pass2").val()
			},
			
			success: function(data)
			{
				if(data == "success")
				{
					$("#output_pass2").css('float', 'right').html('<img src="../images/ok.jpg" class="small_image" alt="Ok" width="20px" height="20px"/>');
					$("#output_pass1").css('float', 'right').html('<img src="../images/ok.jpg" class="small_image" alt="Ok" width="20px" height="20px"/>');
				}else 
					  {
							$("#output_pass2").css("color", "red").html(data);
					  }
			}
	});
}

function check_email()
{
		$.ajax(
	{
		type:"post",
		url:"registerCompte.php",
		data:{
			'email_check': $("#email").val()
			},
			
			success: function(data)
			{
				if(data == "success")
				{
					$("#output_email").html('<img src="../images/ok.jpg" class="small_image" alt="Ok" width="20px" 		        	 						height="20px"/>').css('float', 'right');
				}else 
					  {
							$("#output_email").css("color", "red").html(data);
					  }
			}
	});
}

// Traitement du formulaire d'inscription
$("#register_form").submit(function(){
	var status = $("status");
	var nom = $("#nom").val();
	var prenom = $("#prenom").val();
	var pseudo = $("#pseudo").val();
	var pass1 = $("#pass1").val();
	var pass2 = $("#pass2").val();
	var email = $("#email").val();
	var type = $("#type").val();
	
	if(nom =="" || prenom == "" || pseudo == "" || pass1 == "" || pass2 == "" || email == "")
	{
		status.css('color', 'red').html("Veuillez remplir tous les champs.").fadeIn(400);
	} else if(pass1 != pass2)
		{
			status.html("Les deux mots de passe sont différents.").fadeIn(400);
		} else
			{
				$.ajax(
	{
		type:"post",
		url:"registerCompte.php",
		data:{
			'nom': nom,
			'prenom': prenom,
			'email': email,
			'pseudo': pseudo,
			'pass1': pass1,
			'pass2': pass2,
			'type':type
			},
			beforeSend: function()
			{
				$("#bRegister").attr("value", "Traitement en cours...");
			},
				
			success: function(data)
			{
				if(data != "register_success")	
				{
					status.html(data).fadeIn(400);
					$("#bRegister").attr("value", "Créer mon compte");
				}else 
					  {
							$("h4, h6").hide();
							  $("#formulaire").html("<strong></strong>Juste une dernière étape! "+ prenom + " "+ nom +"</strong> </br>Un lien d'activation de votre compte vient de vous être envoyé à l'adresse electronique indiquée lors de votre inscription.</br> Veuillez tout simplement clique ce lien et vous serez définitivement enregistré chez SANIFERE. <br />Pensez à verifier dans votre spam et dans vos messages indésirés.").css("width", "inherit").fadeIn(400);
					  } 
			}
	});}
	});
</script>
</body>
</html>