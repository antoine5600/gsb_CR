<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Consulter Compte-Rendu</title>
	<?php include('layout/head.php');?>	
</head>
<body>

    <!-- Navigation -->
    <?php include('layout/layoutconnected.php');?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            	<?php 
            	foreach ($listecr as $ligne){
            		echo $ligne['RAP_BILAN'];
            	}
            	?>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <?php include('script/script.php');?>
</body>
</html>
