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
            <?php if($listecr){ ?>
	            <table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Date</th>
							<th>Motif</th>
							<th>Bilan</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							
				            	$indice = 1;
				            	for ($i = 0; $i < count($listecr) ; $i++)
				            	{
					  				echo "<tr>";
							  			echo "<th scope='row'>".$indice."</th>";
							  			echo "<td>".$listecr[$i]['RAP_DATE']."</td>";
							  			echo "<td>".$listecr[$i]['RAP_MOTIF']."</td>";
						            	echo "<td>".$listecr[$i]['RAP_BILAN']."</td>";
						            	$indice += 1;
					            	echo "</tr>";
					            }
			            ?>
            		</tbody>
				</table>
			<?php } else echo "Erreur, aucun Compte rendu!"; ?>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <?php $this->load->view('script/script.php');?>
</body>
</html>
