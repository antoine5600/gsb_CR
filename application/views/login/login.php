<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome to CodeIgniter</title>
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
					<p>
						<label for="login">Login*</label>
						<input id="login" type="text" name="login"  size="30" maxlength="45"/>
					</p>
					<p>
						<label for="mdp">Mot de passe*</label>
						<input id="mdp"  type="password"  name="mdp" size="30" maxlength="45"/>
					</p>
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