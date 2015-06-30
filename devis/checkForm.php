<?php
    $nom                = "";
    $prenom             = "";
    $adresse            = "";
    $phone              = "";
    $email              = "";
    $surface            = "";
    $remarque           = "";
    $deratisation       = "";
    $punaises           = false;
    $cafards            = false;
    $desinsectisation   = false;
    $autre              = false;
    $check              = "vide";
    if (isset($_POST['nom'])) $nom                              = $_POST['nom'];
    if (isset($_POST['prenom'])) $prenom                        = $_POST['prenom'];
    if (isset($_POST['adresse'])) $adresse                      = $_POST['adresse'];
    if (isset($_POST['phone'])) $phone                          = $_POST['phone'];
    if (isset($_POST['email'])) $email                          = $_POST['email'];
    if (isset($_POST['surface'])) $surface                      = $_POST['surface'];
    if (isset($_POST['remarque'])) $remarque                    = $_POST['remarque'];
    if (isset($_POST['deratisation'])) $deratisation            = "checked";
    if (isset($_POST['punaises'])) $punaises                    = "checked";
    if (isset($_POST['cafards'])) $cafards                      = "checked";
    if (isset($_POST['desinsectisation'])) $desinsectisation    = "checked";
    if (isset($_POST['autre'])) $autre                          = "checked";
    if ($nom != "" && $prenom != "" && $adresse != "" && $phone != "" && $email != "" && $surface != "" && $remarque != "" && ($deratisation || $punaises || $cafards || $desinsectisation || $autre)) $check       = "complet";
    else if ($nom != "" || $prenom != "" || $adresse != "" || $phone != "" || $email != "" || $surface != "" || $remarque != "" || ($deratisation || $punaises || $cafards || $desinsectisation || $autre)) $check = "partiel";
?>