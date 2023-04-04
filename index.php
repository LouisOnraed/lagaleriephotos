<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-GD2NFN8L5B"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			
			gtag('config', 'G-GD2NFN8L5B');
		</script>
		<title>Galerie Photos</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css?v=<?php echo(time()); ?>" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<?php include_once("header.php"); ?>

				<!-- Main -->
					<div id="main">
						<?php
						include_once('con_Img.php');
						$sqlQuery = 'SELECT * FROM `all_img` ORDER BY id DESC';
						$ImagesStatement = $db->prepare($sqlQuery);
						$ImagesStatement->execute();
						$Images = $ImagesStatement->fetchAll();

						foreach($Images as $Image){
							?>
							<article class="thumb">
								<a href="images/all/<?php echo($Image['nom_image']);?>" class="image"><img src="images/all/<?php echo($Image['nom_image']);?>" alt=""/></a>
								<h2><?php echo($Image['titre']);?></h2>
								<p><?php echo($Image['description']);?></p>
								<p>Posté le <?php echo($Image['date_publication']);?></p>
							</article>
							<?php
						}
						?>
					</div>

				<!-- Footer -->
					<footer id="footer" class="panel">
						<div class="inner split">
							<div>
							    <?php include_once("footer_icon.php"); ?>
								<div>
									<section>
										<h2><a href="J.E.php">Photos des Jeux Européens</a></h2>
									</section>
								</div>
							</div>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>