<?php
if (!($cnx = mysqli_connect("localhost","maxime","passf203","dbmiNewWorld"))) {
	echo ("Connexion impossible".$cnx->connect_error());
		return false;	
}
$cnx->query("set names utf8_bin");
$url_home = "Index_connexion.php";
?>

<!doctype html>
<html lang="fr">

<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>

<!-- <div class="connexion formulaireLogin">
<form method="GET" action="">
<h3>Vous avez déjà un compte ?</h3><br>
	<fieldset><legend>Connexion :</legend>
		<input type="text" name="identifiant" placeholder="Identifiant"><br><br>
		<input type="password" name="password" placeholder="Mot de passe" required=""><br><br>
		<button type="submit" name="buttn">Valider</button><br><br>
	</fieldset>
		<a class="forgot" href="">Mot de passe oublié ?</a>
-->

<?php

	if (isset($_REQUEST['buttn'])) 
	{
		$password=$_REQUEST['userMdp'];


		$_SESSION['userMail']=$_GET['userMail'];
		$_SESSION['userMdp']=$_GET['userMdp'];
		
//
		$req = '(SELECT userMail,userMdp from utilisateur where userMail="'.$_GET['userMail'].'"'.' AND userMdp ="'.$_GET['userMdp'].'");';
		$result=$cnx->query($req);
		//echo 'SELECT identifiant,Nom,Prenom,Mail,Password from User where identifiant="'.$_GET['identifiant'].'"<br>';
		if ($result==false OR $result->num_rows<1 ) 
		{
			$message='Utilisateur inconnu';
		}
		else 
		{
			$ligne = $result->fetch_array();
			if ($ligne['userMdp']==$password) {
				$_SESSION['userMail']=$_REQUEST['userMail'];
				$_SESSION['userMdp']=$ligne['userMdp'];					
			$message = "<div> Vous êtes connecté </div>";
			$connexion=true;
			}	
			else 
			{
			$message='Identifiant non reconnus';		
			}
		}
	echo $message;
	}
?>

</form>
</div>
<?php
mysqli_close($cnx);
?>
 
<!--Card-->
<div class="card" style="max-width: 800px; left: 20px;bottom: -128px;background-color: #BBD1CE;">

    <!--Card image-->
    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/Carousel-thumbs/img%20%2831%29.jpg" alt="Card image cap">

    <!--Card content-->
    <div class="card-body">
        <!--Title-->
        <h4 class="card-title">Connexion</h4>
        <!--Text-->
        <p class="card-text">
        	<form method="GET" action="Connexion_inscriptionNW.php">
	        	<fieldset class="formInsc">
					<input type="text" name="userMail" placeholder="Adresse mail"><br><br>
					<input type="password" name="userMdp" placeholder="Mot de passe" required=""><br><br>
	        		<button type="submit" class="btn btn-primary" name="buttn">Valider</button>
				</fieldset>
			</form>
        </p>
    </div>

</div>
<!--/.Card-->
                


</body>
</html>