<?php
	error_reporting(E_ALL);
	session_start();
	include('Config.php');

	try {
		$connexion = new PDO($sourceDb, $userDb, $motDePasseDb);

		$requete = "SELECT * FROM content WHERE Page = 'plandusite' || Page = 'all'";
		$resultat = $connexion->query($requete);
		$paragraphe = array();
		foreach ($resultat as $ligne) {
			$paragraphe[$ligne['ID']] = $ligne['Value'];
		}
		$requete = "SELECT * FROM images WHERE Page = 'plandusite' || Page = 'all'";
		$resultat = $connexion->query($requete);
		$image = array();
		$alt = array();
		foreach ($resultat as $ligne) {
			$image[$ligne['ID']] = $ligne['Path'];
			$alt[$ligne['ID']] = $ligne['Alt'];
		}
	} catch (PDOException $e) {
		print 'Erreur PDO : '.$e->getMessage().'<br />';
		die();
	}
?>

<html lang="fr">
	<head>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	    <meta name="Description" CONTENT="Dératisation, désinsectisation, rats, souris, punaises de lit, puces, cafards, blattes, mites, guêpes, etc... Paris IDF, Agréée Ministère Certifiée">
	    <meta name="keywords" content="Expert,nuisible,traitement,deratisation,desinfection,punaises de lit,punaise">
	    <title>Plan du site</title>
	    <meta name="robots" content="index,follow">
	    <link rel="stylesheet" type="text/css" href="/template/style.css">
	    <link rel="shortcut icon" type="image/x-icon" href="/images/natif/favicon.ico">

	    <?php 
	    	if(isset($_SESSION['ID'])) {
	    		echo '<script charset="utf-8" src="/js/jquery.js"></script>';
				echo '<script src="/js/main.js"></script>';
				echo '<script language="javascript" type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>';
				echo '<script language="javascript" type="text/javascript" src="/js/tinymce/basic_config.js"></script>';
	    	}
	    ?>
	</head>
	<body>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		  ga('create', 'UA-3936191-5', 'auto');
		  ga('send', 'pageview');
		</script>
		<header>
			<div id="tophead" class="container-sheet">
				<div id="logo" class="head_element">
					<a href="/"><img alt="<?php echo $alt[7]; ?>" src="<?php echo $image[7]; ?>"></a>
				</div>

				<div id="subtophead" class="head_element">
				    <a href="tel:0147221313"><img src="/images/rightheader.jpg"></a>
				</div>

				<ul id="menu" class="head_element">
				    <li><a href="/">Accueil</a></li>
				    <li><a href="/prestations/devis">Devis</a></li>
				    <li><a href="/prestations/conseils">Nos conseils</a></li>
				    <li><a href="/prestations/tarifs">Tarifs</a></li>
				    <li><a href="/prestations/equipe">Notre &eacute;quipe</a></li>
				    <li><a href="/prestations/contact">Contact</a></li>
				</ul>
			</div>

			<div id="subhead" class="container-sheet">
				<div class="welcome">
					<h1 id="23" class="editable"><?php echo $paragraphe[23]; ?></h1>

					<div id="24" class="editable">
						<?php  echo $paragraphe[24]; ?>
					</div>
				</div>
			</div>
		</header>

		<div id="main">
			<div id="submain" class="container-sheet">
			    <section class="column_container">
		        	<div class="column left">
							- <a href="/index.php">Homepage</a><br />
							<span class="tab">- <a href="/deratisation">D&eacute;ratisation</a></span><br />
							<span class="tab">- <a href="/desinsectisation">D&eacute;sinsectisation</a></span><br />
							<span class="tab">- <a href="/depigeonnage">D&eacute;pigeonnage</a></span><br />
							<span class="tab">- <a href="/debarras">D&eacute;barras</a></span><br />
							<span class="tab">- <a href="/punaisedelit">Punaises de lit</a></span><br />
							<span class="tab">- <a href="/cafard">Cafard</a></span><br /><br />
							<span class="tab">- <a href="/prestations/devis">Devis</a></span><br />
							<span class="tab">- <a href="/prestations/conseils">Nos conseils</a></span><br />
							<span class="tab">- <a href="/prestations/tarifs">Tarifs</a></span><br />
							<span class="tab">- <a href="/prestations/equipe">Notre &eacute;quipe</a></span><br />
							<span class="tab">- <a href="/prestations/contact">Contact</a><br /></span><br />
					</div>

					<div class="column rigth">
<!--  Deratisation -->
						<div class="sub_column">
							<h3>Dératisation</h3>
							<?php include('content/deratisationLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Dératisation prix</h3>
							<?php include('content/deratisationPrixLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Dératisation tarifs</h3>
							<?php include('content/deratisationTarifLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Dératisation restaurant</h3>
							<?php include('content/deratisationRestaurantLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Dératisation contrat</h3>
							<?php include('content/deratisationContratLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Dératisation entreprise</h3>
							<?php include('content/deratisationEntrepriseLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Dératisation societe</h3>
							<?php include('content/deratisationSocieteLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Deratiseur</h3>
							<?php include('content/deratiseurLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Dératisation prix</h3>
							<?php include('content/deratisationHotelLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Dératisation efficace</h3>
							<?php include('content/deratisationEfficaceLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Dératisation expert</h3>
							<?php include('content/deratisationExpertLinks.php') ?>
						</div>
<!--  Depigeonnage -->
						<div class="sub_column">
							<h3>Depigeonnage</h3>
							<?php include('content/depigeonnageLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Pigeon chasser</h3>
							<?php include('content/pigeonChasserLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Pigeon pic</h3>
							<?php include('content/pigeonPicLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Pigeon eloigner</h3>
							<?php include('content/pigeonEloignerLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Pigeon anti</h3>
							<?php include('content/pigeonAntiLinks.php') ?>
						</div>
<!--  Cafards -->
						<div class="sub_column">
							<h3>Cafards</h3>
							<?php include('content/cafardsLinks.php') ?>
						</div>
<!--  Debarras -->
						<div class="sub_column">
							<h3>Debarras</h3>
							<?php include('content/debarrasLinks.php') ?>
						</div>
<!--  Desinsectisation -->
						<div class="sub_column">
							<h3>Desinsectisation</h3>
							<?php include('content/desinsectisationLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Desinsectisation punaises de lit</h3>
							<?php include('content/desinsectisationPunaisesdelitLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Desinsectisation mites</h3>
							<?php include('content/desinsectisationMitesLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Desinsectisation cafards</h3>
							<?php include('content/desinsectisationCafardsLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Desinsectisation blattes</h3>
							<?php include('content/desinsectisationBlattesLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Desinsectisation puces</h3>
							<?php include('content/desinsectisationPucesLinks.php') ?>
						</div>
<!--  Punaises de lit -->
						<div class="sub_column">
							<h3>Punaises de lit</h3>
							<?php include('content/punaisesdelitLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit astuce</h3>
							<?php include('content/punaisesdelitAstuceLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit extermination</h3>
							<?php include('content/punaisesdelitExterminationLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit exterminer</h3>
							<?php include('content/punaisesdelitExterminerLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit elimination</h3>
							<?php include('content/punaisesdelitEliminationLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit eliminer</h3>
							<?php include('content/punaisesdelitEliminerLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit repulsif</h3>
							<?php include('content/punaisesdelitRepulsifLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit traitement</h3>
							<?php include('content/punaisesdelitTraitementLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit image</h3>
							<?php include('content/punaisesdelitImageLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit insecticide</h3>
							<?php include('content/punaisesdelitInsecticideLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit oeuf</h3>
							<?php include('content/punaisesdelitOeufLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit origine</h3>
							<?php include('content/punaisesdelitOrigineLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit photo</h3>
							<?php include('content/punaisesdelitPhotoLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit quoi faire</h3>
							<?php include('content/punaisesdelitQuoifaireLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit qui paye</h3>
							<?php include('content/punaisesdelitQuipayeLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit solution</h3>
							<?php include('content/punaisesdelitSolutionLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit desinfection</h3>
							<?php include('content/punaisesdelitDesinfectionLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit hotel</h3>
							<?php include('content/punaisesdelitHotelLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit hygiene</h3>
							<?php include('content/punaisesdelitHygieneLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit larve</h3>
							<?php include('content/punaisesdelitLarveLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit matelas</h3>
							<?php include('content/punaisesdelitMatelasLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit cause</h3>
							<?php include('content/punaisesdelitCauseLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit piqure</h3>
							<?php include('content/punaisesdelitPiqureLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Punaises de lit debarrasser</h3>
							<?php include('content/punaisesdelitDebarrasserLinks.php') ?>
						</div>
						<div class="sub_column hidden">
							<h3>Puces de lit</h3>
							<?php include('content/pucesdelitLinks.php') ?>
						</div>
					</div>
	        	</section>
			</div>
		</div>
		<footer>
		    <div id="subfoot" class="container-sheet">
		        <div id="4" class="editable">
					<?php  echo $paragraphe[4]; ?>
				</div>
		    </div>
		</footer>
	</body>
</html>