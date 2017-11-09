<?php include 'ConnectBase.php';  ?>

<!doctype html>
<html lang="fr">

<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="NewLot.css">
</head>

<body>
<?php 
	include 'hautNW.php';
	include 'menuNW.php' ;
	include 'basNW.php' ;
?>

<div class="Lot">
	<form method="GET" action="">
		<fieldset><legend>Entrez les caractristiques de votre produit</legend>
			<input type="text" name="Produit" ><label for="Espece">Produit</label><br>
		 	<select name="fruit">
				<?php 
				$req = "SELECT produit FROM Produits WHERE Type=\"Fruit\"";
				echo $req;
				global $cnx;

				$liste_fruit = $cnx->query($req);
				var_dump($liste_fruit);
				die();
				$data = $liste_fruit->fetch_assoc();
				var_dump($data['produit']);

				// $req = $bdd->query("show columns from lot like '$enum'");
				// $req->data_seek(0);
				// $row = $req->fetch_assoc();

				while ($ligne=$data)
					 echo '<option value="'.$ligne['id'].'">'.$ligne['note'].'</option>';
				 
				 ?>
			</select>
			<input type="radio" value="Legume" name="type" id="legume" class="type_produit"><label for="legume">Légume</label>
			<input type="radio" value="Fruit" name="type" id="fruit" class="type_produit"><label for="fruit">Fruit</label>
			<input type="radio" value="Autre" name="type" id="autre" class="type_produit"><label for="autre">Autre</label><br>

			<input type="text" name="Qte"><label for="Qte">La quantité (total à vendre)</label>
			
			<select name="UniteMesure"><label>Unité de mesure</label>
				<option value="kilos">en kilogramme (kg)</option>
				<option value="litre">en Litre (L)</option>
				<option value="unite">a l'unité </option>
			</select><br>

				<div class="Distrib">
					<form>
						<fieldset><legend>Choisissez vos points de distributions</legend>
						<pr> Maintenez la touche Ctrl pour en séléctionner plusieurs</pr>
							<select name="PointDistrib[]" multiple class="ListeDistrib">
								<?php
								$point=['3305','52014','3316','3208','04078','20015','75012','32158'];
									for ($count=0; $count <= sizeof($point)-1 ; $count++) { 
										echo "<option value=$point[$count]>$point[$count]</option>"; //Faire un tableau $point des points de distrib
									}
								?>
							</select>
						</fieldset>
					</form>
				</div>

			<input type="text" name="LieuProd"><label for="LieuProd">Lieu de production</label><br>
			
			<input type="date" name="DateProd"><label for="DateProd">Date de production</label><br>
			
			<input type="date" name="DateConso"><label for="DateConso">Date limite de consommation</label><br>
			
			<input type="text" name="PrixVente" placeholder="Par litre, kilos ou a l'unité"><label for="PrixVente">Prix de vente</label><br>
			
			<input type="text" name="QteMiniVente" placeholder="Par litre, kilos ou a l'unité"><label for="QteMiniVente">Quantité minimum d'achat </label><br>
			
			<select name="ModeProd"><label>Mode de production</label>
				<option value="OGM">Avec OGM</option>				
				<option value="Bio">Biologique</option>
				<option value="Trad">Traditionnelle</option>
			</select><br>
			
			<input type="text" name="NomProducteur"><label>Nom de producteur</label><br>



			<input type="submit" value="Validation" placeholder="Validation"><br>
		</fieldset>
	</form>
</div>


<?php 


	function execReq($req) {
		global $cnx;
		
		$result = $cnx->query($req); 
		//or die("La requête \"$req\" a échoué : ".$cnx->error);
		// on ferme la connexion
		mysqli_close($cnx);
		// return $result;
		
	}

$Produit=$_GET["Produit"];
$type=$_GET["type"];
$Qte=$_GET["Qte"];
$UniteMesure=$_GET["UniteMesure"];
$DateProd=$_GET["DateProd"];
$LieuProd=$_GET["LieuProd"];
$DateConso=$_GET["DateConso"];
$PrixVente=$_GET["PrixVente"];
$QteMiniVente=$_GET["QteMiniVente"];
$UniteMesure=$_GET["UniteMesure"];
$NomProducteur=$_GET["NomProducteur"];
$ModeProd=$_GET["ModeProd"];



// if ($Espece!="" AND $Type!="" AND $Qte!="" AND $UniteMesure!="" AND $ModeProd!="" AND $LieuProd!="" AND $dateProd!="" AND $DateConso!="" AND $PrixVente!="" AND $QteMiniVente!="" AND $NomProducteur!="") {
$req="INSERT INTO `NewWorld2`.`Lot` (`type`,`produit`,`dateRecolte`,`dateLimiteConso`, `prixUnitaire`,`uniteMesure`,`QteMiniVente`,`qteTotal`) VALUES ("."'".$type."'".","."'".$Produit."'".","."'".$DateProd."'".","."'".$DateConso."'".","."'".$PrixVente."'".","."'".$UniteMesure."'".","."'".$QteMiniVente."'".","."'".$Qte."'".")";	
	echo $req;
execReq($req);
// }
// else { 
// 	echo "Des champs n'ont pas été remplis";
// }

// ,`PrixVente`,`QteVenteMini`,`ModeProd`,`NomProducteur`
// ,"."'".$PrixVente."'".","."'".$QteMiniVente."'".","."'".$ModeProd."'".","."'".$NomProducteur."'"."
 ?>


</body>
</html>