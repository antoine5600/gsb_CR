<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Consulter Compte-Rendu</title>	
	<?php $this->load->view('layout/head.php');?>
</head>
<body>

    <!-- Navigation -->
    <?php $this->load->view('layout/layoutconnected.php');?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            	<?php 
            	foreach ($listecr as $ligne){
            		echo $ligne;
            	}
            	?>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <?php $this->load->view('script/script.php');?>
</body>
</html>
