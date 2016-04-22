<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Details Compte-Rendu</title>	
	<?php $this->load->view('layout/head.php');?>
</head>
<body>
<?php
	$this->load->helper('url');
	$path = base_url();
?>
    <!-- Navigation -->
    <?php $this->load->view('layout/layoutconnected.php');?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <a href="" class='btn btn-primary'><i class="fa fa-chevron-left"></i> Précédent</a> <!-- lien a faire -->
	            <!-- données à récuperer :liste de practiciens, date du rapport , motif du rapport
	            bilan, et bouton précédent suivant -->
	            <table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Nom du Practicien</th>
							<th>Date</th>
							<th>Motif</th>
							<th>Bilan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
					    	<th scope='row'> 1 </th>
					  		<td><?php echo $unprac['PRA_NOM']?></td>
					  		<td><?php echo $listecr[0]['RAP_DATE']?></td>
					  		<td><?php echo $listecr[0]['RAP_MOTIF']?></td>
				           	<td><?php echo $listecr[0]['RAP_BILAN']?></td>
			           	</tr>
            		</tbody>
				</table>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Nom du Medicament</th>
							<th>Quantité</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						for ($i = 0; $i < count($lesmedocs) ; $i++)
						{ ?>
						<tr>
					    	<td></td>
					    	<td><?php echo $lesmedocs[$i][0]['MED_NOMCOMMERCIAL']?></td>
					    	<td><?php echo $qtemedocs[$i]['OFF_QTE']?></td>
			           	</tr>
			           	<?php }?>
            		</tbody>
				</table>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <?php $this->load->view('script/script.php');?>
</body>
</html>

