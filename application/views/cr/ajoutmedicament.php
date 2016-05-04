<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Ajouter un medicament</title>
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
            	<a href="<?php echo $path ?>crController/index" class='btn btn-primary'><i class="fa fa-chevron-left"></i> Précédent</a>
			    <h2>Ajouter un medicament</h2>
				<?php if (isset($erreur))	echo '<div class ="erreur"><ul><li>'.$erreur.'</li></ul></div>'; ?>
				<form method="post" action="<?php echo $path.'crController/ajoutmedicament';?>">
					<label for="medicament">Choix du médicament*</label>
					<select name="medicament">
					<?php foreach ($listmedicament as $medicament)
					{
						echo "<option value=".$medicament['MED_DEPOTLEGAL'].">";
						echo $medicament['MED_NOMCOMMERCIAL']."</option>";
					}
					?>
					</select>
					<p>
						<label for="echantillion">Nombre echantillions*</label>
						<input id="echantillion" type="text" required name="echantillion"  size="30" maxlength="45"/>
					</p>
					<input id="rap_num" type="hidden" name="rap_num"  value = <?php echo $rap_num; ?> />
					<p>
						<input class='btn btn-primary' type="submit" value="Valider" name="valider"/>
						<input class='btn btn-primary' type="reset" value="Annuler" name="annuler"/> 
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