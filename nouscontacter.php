<!doctype html>
<html lang="fr">

<head>

<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="MDB_Free/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="MDB_Free/css/mdb.css">
<link rel="stylesheet" type="text/css" href="NewWorld.css">
</head>

<body>
	<?php 
	include 'hautNW.php';
	include 'menuNW.php' ;

	// include 'partieGrise.php';
	include 'basNW.php' ;
	?>

<!--Section: Contact v.2-->
<?php

if ((isset($_GET['btn']) and !empty($_GET['leMessage']) and !empty($_GET['leNom']) and !empty($_GET['leMail']) and isset($_GET['leMessage']) and isset($_GET['leNom']) and isset($_GET['leMail']))) {

    $today = date("Y-m-d H:i:s"); 
    echo $today;

    $sonIp=$_SERVEUR['REMOTE_ADDR'];
    ?>
    <div class="nousContacter"><p>Votre mail a bien été envoyé, nous vous répondrons a l'adresse donnée dès que possbile.</p></div>
    <?php
    
    // Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
    $_GET['leMessage'] = wordwrap($_GET['leMessage'], 70, "\n");
    // Envoi du mail
    //mail('maxime.iori@gmail.com', $_GET['leSujet'], $_GET['leMessage']);

}
else{
?>
    <section class="section nousContacter">

    <!--Section heading-->
    <h2 class="section-heading h1 pt-4">Contactez nous !</h2>
    <!--Section description-->
    <p class="section-description">Vous ne pouvez envoyer qu'un seul mail toute les 30 minutes ! </p>

        <div class="row">

            <!--Grid column-->
            <div class="col-md-8 col-xl-9">
                <form method="GET" action="">

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form">
                                <div class="md-form">
                                    <input type="text"  id="contact-name" class="form-control" name="leNom" placeholder="Votre nom et prénom">
                                </div>
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form">
                                <div class="md-form">
                                    <input type="email" id="contact-email" class="form-control" required placeholder="Votre adresse e-mail" name="leMail">
                                </div>
                            </div>
                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form">
                                <input type="text" id="contact-Subject" class="form-control" placeholder="Le sujet de votre message" required name="leSujet">
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-12 ">

                            <div class="md-form ">
                                <textarea type="text" id="contact-message" class="md-textarea" required placeholder="Votre message" name="leMessage"></textarea>
                            </div>

                        </div>
                    </div>
                    <!--Grid row-->
                <button type="submit" class="btn btn-primary" name="btn">Valider</button>
                </form>
            </div>
            <!--Grid column-->
        </div>
    </section> 
    <!--Section: Contact v.2-->
    <?php
    if (isset($_GET['btn'])) {
        if (empty($_GET['leMail']) or !isset($_GET['leMail'])) {
            ?>
            <p class="marge">Le champ email a mal était rempli, veuillez réessayer</p>
            <?php
        }
        if (empty($_GET['leNom']) or !isset($_GET['leNom'])) {
            ?>
            <p class="marge">Le champ nom et prénom a mal était rempli, veuillez réessayer</p>
            <?php
        }
        if (empty($_GET['leSujet']) or !isset($_GET['leSujet'])) {
            ?>
            <p class="marge">Le champ sujet a mal était rempli, veuillez réessayer</p>
            <?php
        }
        if (empty($_GET['leMessage']) or !isset($_GET['leMessage'])) {
            ?>
            <p class="marge">Le message n'a pas été saisie, veuillez réessayer</p>
            <?php
        }
    }
}

?>

</body>
</html>