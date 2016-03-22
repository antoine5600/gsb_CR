<?php
	$this->load->helper('url');
	$path = base_url();
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
	<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li>
					<a class="navbar-brand" href="<?php echo $path ?>Welcome/index">
						<img src="http://gsb-ahmed.fr/wp-content/uploads/2015/10/LOGO-GSB.png" alt="logo" style="width: 110px;">
					</a>
				</li>
				<li>
					<?php echo anchor('crController/index','Compte-Rendu')?>
				</li>
				<li>
					<a href="#">Visiteur</a>
				</li>
				<li>
					<a href="#">Practiciens</a>
				</li>
				<li>
					<a href="#">Medicaments</a>
				</li>
				<li>
					<a href="#">Contact</a>
				</li>
				<li class="logout">
					<a href="<?php echo $path ?>Welcome/deconnecter"><i class="fa fa-sign-out"></i> Se Déconnecter</a>
				</li>
				<li class="logout">
					<a href="#">Bonjour <?php echo $this->session->prenom;?> <?php echo $this->session->nom; ?></a>
				</li>
			</ul>
		</div>
	<!-- /.navbar-collapse -->
	</div>
<!-- /.container -->
</nav>
