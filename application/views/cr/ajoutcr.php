<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Ajouter un compte rendu</title>
	<?php
		$this->load->view('layout/head.php');
	?>
</head>
<body>

<?php
	$this->load->helper('url');
	$path = base_url();
?>
<?php
$this->load->view('layout/layoutconnected.php');
?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
			   <h2>Ajouter un compte rendu</h2>
				<?php if (isset($erreur))	echo '<div class ="erreur"><ul><li>'.$erreur.'</li></ul></div>'; ?>
				<form method="post" action="<?php echo $path.'crController/ajoutcr';?>">
					<p>
						<label for="motif">Motif Visite*</label>
						<input id="motif" type="text" name="motif"  size="30" maxlength="45"/>
					</p>
					<p>
						<label for="bilan">Bilan*</label>
						<input id="bilan"  type="text"  name="bilan" size="30" maxlength="45"/>
					</p>
					<p>
						<label for="date">Date Visite*</label>
						<input id="date" type="date" name="date"  size="30" maxlength="45"/>
					</p>
					<label for="praticien">Choix du praticien*</label>
					<select name="praticien">
					<?php foreach ($listpraticien as $praticien)
					{
						echo "<option value=".$praticien['PRA_NUM'].">";
						echo $praticien['PRA_NOM']."</option>";
					}
					?>
					</select>
					<p>
						<input type="submit" value="Valider" name="valider"/>
						<input type="reset" value="Annuler" name="annuler"/> 
					</p>
				</form>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <?php
		$this->load->view('script/script.php');
	?>

</body>
</html>