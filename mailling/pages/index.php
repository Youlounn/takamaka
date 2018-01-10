<?php
	session_start();

	if(isset($_POST['submit'])){
		require_once'include/connexion.php';
		$errors = array();

		if(empty($_POST['email'])){
			$errors['email'] = "Veuillez saisir un email (login) valide";
		}
		if(empty($_POST['password'])){
			$errors['password'] = "Veuillez saisir un mot de passe valide";
		}
		     $email = htmlentities($_POST['email']);
		     $password =$_POST['password'];
			 $req = $db->prepare('SELECT * FROM utilisateur WHERE email = ? AND mdp = ?');
			 $req->execute(array($email, $password));
			 $donnee = $req->fetch();
			 $reponse = $req->rowCount();
			 if($reponse > 0)
			 {
				$nom = $donnee['nom'];
				$prenom = $donnee['prenom'];
				$type = $donnee['type'];
				$mail = $donnee['mail'];
				$id = $donnee['id'];
				//je crée mes variables de sessions avec l'utilisateur
				$_SESSION['Auth'] = array(
					'email' => $email,
					'password' => $password,
					'nom' => $nom,
					'prenom' => $prenom,
					'type' => $type,
					'idUser' => $id
					);
				if($donnee['type'] == 1){
					header("Location:accueilAdmin.php");
				}
				else
					{
						header("Location:campagne/accueilCampagne.php");
					}
			 }
			 else
				{
					 $errors['compte'] = "Mot de passe ou pseudo invalide!".$password;
				}
	}

?>

<!doctype html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width = device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../images/logo-takamaka.jpg"><title>TAKAMAKA</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../Icon-font/assets/Pe-icon-7-stroke.css">
        <link rel="stylesheet" href="../font-awesome/css/font-awesome.css">
		<link rel="stylesheet" href="monstyle.css">
    	<style>
			body{
				margin: 0 auto;
				background-image:url(../images/logo-takamaka.jpg);
				background-repeat:no-repeat;
				background-size: 100% 800px;
			}
			.contenu{
				width:500px;
				text-align:center;
				background-color:#16a085;
				border-radius:5px;
				margin:0 auto;
				margin-top:80px;
				opacity:0.8;
			}
			.contenu img {
			width:120px;
			height:120px;
			margin-top:-60px;
			margin-bottom:30px;
			}
			.login{
				padding:20px 20px 10px 0px;
				}
			.login a{
				text-decoration:none;
				color:#000;
				outline:none;
				}
			.login a:hover{
				text-decoration:none;
				background-color:inherit;
				}
			.carousel .item img {
				height:150px;
				width:90%;
				align-items:center;
				padding-left:100px;
				}
			.text{
				color:#ecf0f1;
				padding-bottom:60px;
				}

			.text div {
				position:absolute;}

			.text div p{
				font-size:30px;}

			.navbar-nav a:hover{
				color:#1abc9c;
				}
			.login{
				padding:20px 20px 10px 0px;
				}
			.login a{
				text-decoration:none;
				color:#000;
				outline:none;
				}
			.login a:hover{
				text-decoration:none;
				background-color:inherit;
				}
			.carousel .item img {
				height:150px;
				width:90%;
				align-items:center;
				padding-left:100px;
				}
			.text{
				color:#000;
				padding-bottom:60px;
				}

			.text div {
				position:absolute;}

			.text div p{
				font-size:30px;}

			.navbar-nav a:hover{
				color:#1abc9c;
				}

        </style>
    </head>

<body>
	<?php if(!empty($errors)):?>
        <div class=" alert alert-danger">
           <h3>Accès refusé!!!</h3>
              <ul>
                <?php  foreach($errors as $error): ?>
                <li><?php echo $error; ?></li>
                <?php endforeach; ?>
              </ul>
        </div>
     <?php endif; ?>

	<section class="">
        <div class="carousel slide">
        	<div class="carousel-inner">
                <div class="item">
                	<img src="../images/logo-takamaka.jpg" alt="logo" class="img-rounded">
                </div>
                <div class=" active item">
                	<img src="../images/tak.jpg" alt="logo" class="img-rounded">
                </div>
                <div class="item">
                	<img src="../images/barrage_takamaka.jpg" alt="logo" class="img-rounded">
                </div>
                <div class="item">
                	<img src="../images/ta.jpg" alt="logo" class="img-rounded">
                </div>
            </div>
        </div>

        <aside class=" col-md-offset-2">
        	<div class="text">
                    <div>
                        <p>Bienvenu sur la plate forme TAKAMAKA // e-Mailing</p>
                    </div>
                    <div>
                        <p>Welcome on the platform of TAKAMAKA // e-Mailing</p>
                    </div>
            </div>
         </aside>
    </section>

	<section class="container">
  		  <div class="row">
          	<span class="logo pull-left"  >
    			<img src="../images/barrage_takamaka.jpg" alt="logo" class="img-rounded" height="90" width="90">
   			</span>
          	<nav class="nav navbar-collapse" role="navigation" style="border:1px solid #000; background:#16a085;">
                <div class="navbar-header" style="padding:0px;">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                   </button>
            	</div>
        	 	<div class="collapse navbar-collapse">
            		<ul class="nav navbar-nav">
                            <li class="active"><a href="#bibliotheque" data-toggle="dropdown">Bibliothèque </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Messages</a></li>
                        <li><a href="mailling/accueilMailling.php">Mailing</a></li>
                    </ul>
                </li>
                <li><a href="#">Gestion des campagnes</a></li>
                <li><a href="#configuration">Configuration</a></li>
                <li><a href="#campagne" data-toggle="dropdown">Corbeille</a>
                	<ul class="dropdown-menu">
                    	<li><a href="#">Campagne</a></li>
                        <li><a href="#">Messages</a></li>
                        <li><a href="../mailling/accueilMailling.php">Mailing</a></li>
                    </ul>
                </li>
                		</ul>
                	<div class="login pull-right">
                	<button class="btn-default" id="seLoguer">Se connecter</button>
                    <button class="btn-default"><a href="creerCompte.php">Créer un compte</a></button>
                	</div>


            	</div>
            </nav>
   		</div>
	</section>

    <section>
        <div class="contenu hide">
            <img src="../images/lo.jpg" alt="" class="img-circle">
            <form action="" method="post">
                <div class="form-input">
                    <input type="text" name="email" placeholder="Entrez votre mail">
                </div>

                <div class="form-input">
                    <input type="password" name="password" placeholder="Entrez votre mot de passe">
                </div>

                <input type="submit" name="submit" value="Se connecter" class="btn-login">
                <a href="creerCompte.php" >
                    <button type="button" class="btn-login">Créer un compte</button>
                </a><br>
                <a href="passForgeted.php" class="passeOublie">Mot de passe oublié ?</a>
            </form>
        </div>
    </section>
    <script src="jquery.min.js"></script>
 	<script src="../bootstrap/js/bootstrap.min.js"></script>
 	<script>
		$(function(){
			$('#seLoguer').on('click', function(){
				$('.contenu').removeClass('hide').fadeIn().animate('fadeInt', 2000);
				});
			$('.dropdown-menu').on('click', function(){
				alert("Veuillez-vous connecter pour avoir accès à ces fonctionnalités! En cliquant sur le boton SE CONNECTER après le OK.");
				});

			$('.carousel').carousel();
			$('.text div:gt(0)').hide();

			setInterval(function(){
				$('.text div:first')
				.fadeOut(500).next().fadeIn(1000).end().appendTo('.text')
				}, 3000);

			$('.text div p').css('text-align', 'center');
			});
 	</script>
</body>
</html>
