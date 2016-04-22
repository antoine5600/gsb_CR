<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Bienvenue sur GSB</title>
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
$this->load->view('layout/layout.php');
?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
			   <h2>Identification utilisateur</h2>
				<?php if (isset($erreur))	echo '<div class ="erreur"><ul><li>'.$erreur.'</li></ul></div>'; ?>
				<form method="post" action="<?php echo $path.'Welcome/connecter';?>">
					<span class="input input--nariko">
						<input class="input__field input__field--nariko" type="text" id="input-20" name="login">
						<label class="input__label input__label--nariko" for="input-20">
							<span class="input__label-content input__label-content--nariko">Nom</span>
						</label>
					</span>
					<span class="input input--nariko">
						<input class="input__field input__field--nariko" type="password" id="input-20" name="mdp">
						<label class="input__label input__label--nariko" for="input-20">
							<span class="input__label-content input__label-content--nariko">Mot de passe</span>
						</label>
					</span>
					<span class="btnLogin">
						<button class="button button--quidel button--round-s" type="submit" value="Valider"><span>Valider</span></button>
						<button class="button button--quidel button--round-s" type="reset" value="Annuler"><span>Annuler</span></button>
					</span>
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