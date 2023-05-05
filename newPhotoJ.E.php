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
						<?php
						include_once('con_Img.php');
						if(isset($_POST['send'])){
							if(isset($_POST['identifient']) && $_POST['identifient'] == "ONRAED" && isset($_POST['mdp']) && $_POST['mdp'] == "LOUISCHATs1"){
								if(!empty($_FILES['image']) && isset($_POST['titre']) && $_POST['titre'] != "" && isset($_POST['description']) && $_POST['description'] != ""){
									$image_name = $_FILES['image']['name'];
									$tmp_nom = $_FILES['image']['tmp_name'];
									$dateheure = date("d-m-Y--h:i:s");
									$new_name_img = $dateheure."-".$image_name;
									$move_image = move_uploaded_file($tmp_nom,"images/J.E/".$new_name_img);
									
									if($move_image){
										$title = $_POST['titre'];
										$title = str_replace("'", " ", $title);
										$title = str_replace('"', " ", $title);
										$description = $_POST['description'];
										$description = str_replace("'", " ", $description);
										$description = str_replace('"', " ", $description);
										$time = date("d/m/Y");
										$req = "INSERT INTO `JE` (`id`, `titre`, `description`, `date_publication`, `nom_image`) VALUES (NULL, '$title', '$description', '$time', '$new_name_img')";
										if($db->query($req)){
											$fichier = $new_name_img;
											
											$image = __DIR__ . "/images/J.E/" . $fichier;

											$infos = getimagesize($image);

											$largeur = $infos[0];
											$hauteur = $infos[1];

											switch($infos["mime"]){
											    case "image/png":
											        $imageSource = imagecreatefrompng($image);
											        break;
											    case "image/jpeg":
											        $imageSource = imagecreatefromjpeg($image);
											        break;
											    default:
											        die("Format d'image incorrect");
											}
											$qrCode = imagecreatefrompng(__DIR__ . "/ressources/qr-code.png");
											$infosQrCode = getimagesize(__DIR__ . "/ressources/qr-code.png");

											imagecopyresampled(
												$imageSource,
												$qrCode,
												0,
												0,
												0,
												0,
												$infos[0] / 5,
												$infos[0] / 5,
												$infosQrCode[0],
												$infosQrCode[1]
											);

											switch($infos["mime"]){
											    case "image/png":
											        imagepng($imageSource, __DIR__ . "/images/withQrCode/" . $fichier);
											        break;
											    case "image/jpeg":
											        imagejpeg($imageSource, __DIR__ . "/images/withQrCode/" . $fichier);
											        break;
											}

											imagedestroy($imageSource);
											imagedestroy($qrCode);

											if(file_exists($image)){
												header("Location: images/withQrCode/$fichier");
											} else{
												$messageError = "L'image avec le QR code n'a paas été créer";
											}
										} else{
											$messageError = "Echec de l'imporation, veuillez réessayer";
										}
									} else{
										$messageError = "Veuillez choisir une image moins lourde";
									}
								} else{
									$messageError = "Veuillez remplir tous les champs";
								}
							} else{
								$messageError = "Identifiant ou mot de passe incorrect";
							}
						}
						?>
						<form action="" method="POST" enctype="multipart/form-data">
							<label>Ajouter une photo</label>
							<label for="identifient">Identifient :</label>
							<input type="text" name="identifient" cols="30" rows="1" id="identifient">
							<label for="mdp">Mot de passe :</label>
							<input type="password" name="mdp" cols="30" rows="1" id="mdp"><br>
							<input type="file" name="image" accept=".jpg,.jpeg,.png">
							<label for="titre">Titre :</label>
							<textarea name="titre" cols="30" rows="1" id="titre"></textarea>
							<label for="description">Description :</label>
							<textarea name="description" cols="30" rows="6" id="description"></textarea>
							<input type="submit" value="Publier !" name="send">
						<p class="error">
							<?php
								if(isset($messageError)) echo $messageError;
							?>
						</p>
						</form>
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