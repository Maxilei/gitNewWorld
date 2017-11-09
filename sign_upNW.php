<!doctype html>
<html lang="fr">

<head>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>

<div class="card" style="max-width: 800px; left: 900px;top: -242px; background-color: #BBD1CE;">

    <!--Card image-->
    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/Carousel-thumbs/img%20%2831%29.jpg" alt="Card image cap">

    <!--Card content-->
    <div class="card-body">
        <!--Title-->
        <h4 class="card-title">Inscription</h4>
        <!--Text-->
        <p class="card-text">
	       	<form method="GET" action="Connexion_inscriptionNW.php">
	        	<fieldset class="formInsc">
					<input type="text" name="nom" placeholder="NOM"><br><br>
					<input type="text" name="prenom" placeholder="Prénom"><br><br>
					<input type="email" name="mail" placeholder="Adresse@mail.exemple "><br><br>
					<input type="text" name="adresse" placeholder="Adresse : N° de Rue - Code postal - Ville"><br><br>
					<input type="password" name="password" placeholder="Mot de passe"><br><br>
					<input type="password" name="password_verif" placeholder="Vérifitcation mot de passe"><br><br>
					<input type="text" name="qsID" placeholder="Question Secrete"><br><br>					
					<input type="password" name="userRepQuesSec" placeholder="ReponseSecrete"><br><br>
				</fieldset>
        		<button type="submit" class="btn btn-primary" name="btn">Valider</button>
			</form>
        </p>
    </div>
</div>

<!-- <div class="inscription formulaireLogin">
	<form method="GET" action="">
		<h3>Vous avez besoin d'en créer un :</h3><br>

			<fieldset><legend>Inscription :</legend>
				<input type="text" name="nom" placeholder="NOM"><br><br>
				<input type="text" name="prenom" placeholder="Prénom"><br><br>
				<input type="email" name="mail" placeholder="Adresse@mail.exemple "><br><br>
				<input type="text" name="identifiant" placeholder="Identifiant"><br><br>
				<input type="password" name="password" placeholder="Mot de passe"><br><br>
				<input type="password" name="password_verif" placeholder="Vérifitcation mot de passe"><br><br>
				<br><button type="submit" name="btn">Valider</button><br><br>
			</fieldset>
	</form>
</div> -->
<?php
function execReq($req) {
	global $cnx;
	if (!($cnx = mysqli_connect("localhost","maxime","passf203","dbmiNewWorld"))) {
	echo ("Connexion impossible".$cnx->connect_error());
		return false;	
	}
	$result = $cnx->query($req); 
	//or die("La requête \"$req\" a échoué : ".$cnx->error);
	// on ferme la connexion
	mysqli_close($cnx);
	return $result;
}

		if (isset($_REQUEST['btn']))
		{

			$pass=$_GET['password'];
			$verif_password=$_GET['password_verif'];
			if ($pass==$verif_password){
			 {
				$reqUserId= "select ifnull(max(utilisateurId),1000)+1 from utilisateur;";
				$_SESSION['utilisateurId']= execReq($reqUserId)->fetch_array()[0];
		//		echo "utilisateurId = ",$_SESSION['utilisateurId'],"\n";
				$dateInsc= "select curdate();";
				$_SESSION['userDateInscrip']= execReq($dateInsc)->fetch_array()[0];
			 	$_SESSION['adresse']=$_GET['adresse'];
				$_SESSION['nom']=$_GET['nom'];
				$_SESSION['prenom']=$_GET['prenom'];
				$_SESSION['mail']=$_GET['mail'];
				$_SESSION['password']=$_GET['password'];
				$_SESSION['password_verif']=$_GET['password_verif'];
				$_SESSION['qsID']=$_GET['qsID'];
				$_SESSION['userRepQuesSec']=$_GET['userRepQuesSec'];
				
			$req="INSERT INTO `dbmiNewWorld`.`utilisateur` (`utilisateurId`,`userDateInscrip`, `userAdresse`,`userRepQuesSec`, `userMail`,`userNbdeTenta`,`userMdp`,`userMailConf`,`userNom`,`userPrenom`,`reseauSocial`,`qsID`) VALUES (".$_SESSION['utilisateurId'].","."'".$_SESSION['userDateInscrip']."'".","."'".$_SESSION['adresse']."'".","."'".$_SESSION['userRepQuesSec']."'".","."'".$_SESSION['mail']."'".","."'"."0"."'".","."'".$_SESSION['password']."'".","."'"."mailConf"."'".","."'".$_SESSION['nom']."'".","."'".$_SESSION['prenom']."'".","."'"."Réseaux Social".""."'".",".$_SESSION['qsID'].");";
			echo $req;
			//execReq($req);
			}
		}
		else
		{
			echo "<div class='fail_pass'> Mots de passes différents </div>";
		}
	}
?>


</body>
</html>