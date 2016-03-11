<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Accueil</title>
	<?php include('layout/head.php');?>	
</head>
<body>

    <!-- Navigation -->
    <?php include('layout/layoutconnected.php');?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>PROJET APPLI-CR</h1>
                <p>L'application de gestion des comptes-rendus de visite va vous servir a conserver un suivi informatise des rapports produits a chaque visite. </br>
					</br>
					Le renseignement precis des elements de compte-rendu vous permettra d'établir un suivi fidele des differentes rencontres realisees avec les </br>
					praticiens et de pouvoir vous y retrouver simplement grace a cette gestion informatique. </br>
					</br>
					A terme, cette application servira à centraliser ces informations grâce a un envoi périodique des informations saisies a votre delegue régional</br>
					et au responsable de secteur. 
                </p>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <?php include('script/script.php');?>
</body>
</html>