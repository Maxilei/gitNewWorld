<div class="header">




<?php 
	if (isset($_SESSION['identifiant)'])){
		echo "<div class='right' id='marge'><a href=''>".$_SESSION['identifiant']."</a></div>";
	}
	else {
		echo "<div class='right' id='marge'><a href='Connexion_inscriptionNW.php'> Connexion/Inscription</a></div>";
	}
 ?>
		
		<div class="right"><a href="">France</a></div>
</div>
