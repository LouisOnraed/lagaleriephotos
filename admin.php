<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<title>Galerie Photos</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css?v=<?php echo(time()); ?>" />
		<link rel="stylesheet" href="assets/css/form.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<?php include_once("header.php"); ?>

				<!-- Main -->
					<div id="main">
						<table>
							<tr>
								<td><a href="newPhotoAll.php"><h2>Nouvelle image dans TOUT</h2></a></td>
							</tr>
							<tr>
								<td><a href="newPhotoJ.E.php"><h2>Nouvelle image dans Jeux Européens</h2></a></td>
							</tr>
						</table>
					</div>

				<!-- Footer -->
					<footer id="footer" class="panel">
						<div class="inner split">
							<div>
							    <?php include_once("footer_icon.php"); ?>
								<div>
									<section>
										<h2><a href="index.php">Retour</a></h2>
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