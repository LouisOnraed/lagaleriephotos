<?php
$fichier = "02-04-2023--09:55:28-3.jpg";
$image = __DIR__ . "/images/all/" . $fichier;
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
        imagepng($imageSource, __DIR__ . "/images/withQrCode/" . time() . "-----" .$fichier);
        break;
    case "image/jpeg":
        imagejpeg($imageSource, __DIR__ . "/images/withQrCode/" . time() . "-----" .$fichier);
        break;
}
imagedestroy($imageSource);
imagedestroy($qrCode);

header("Location: images/withQrCode/");