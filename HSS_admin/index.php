<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Expert-Nuisible | Conseils et solutions anti Nuisibles</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="Resource-Type" content="Document">
        <meta name="Distribution" content="Global">
        <meta name="Description" content="Expert dans la Dératisation, Désinsectisation, et du traitement Cafards et Punaises de lit pour particuliers et professionnels">
        <meta name="Keywords" content="desinsectisation, deratisation, desinfection, depigeonisation, rat, souris, punaise de lit, puce, pigeon, cafard, blatte, mite, guepe, frelon, deratiser, nuisible, insecte, infestation, traitement, insecticide, intervention, societe, extermination, assainissement, hygiène, éradiquer, particulier, professionnel, commercant, restaurants, bar, cafe, magasins, boulangerie, entrepot">
        <meta name="Robots" content="Index, Follow">

        <link rel="stylesheet" type="text/css" href="/EXPERTNUISIBLE/style/main.css">
        <link rel="shortcut icon" type="image/x-icon" href="/EXPERTNUISIBLE/images/favicon.ico">

        <?php include('../content/polymerComponent.php'); ?>
        <?php include('../content/scripts.php'); ?>
    </head>
    <body>
        <?php include('../content/header.php'); ?>

        <div id="main_content">
            <div class="container_sheet main_content_title">
                <h1>Administration Expert-nuisible</h1>
                <h2>DERATISATION PARIS IDF - SPECIALISTE DU TRAITEMENT ANTI PUNAISE DE LIT - ANTI CAFARD - ETC... POUR PROFESSIONNELS ET PARTICULIERS - INTERVENTION RAPIDE - DEVIS GRATUIT SUR APPEL</h2>
                <h5>A votre écoute au quotidien, nous intervenons rapidement et avec efficacité dans les domaines de la dératisation, désinsectisation, dépigeonisation et désinfection. Hss Expert nuisible est à VOTRE écoute.</h5>
            </div>
            <div class="container_sheet main_content_article">
                <form is="iron-form" id="form_admin" method="post" action="">
                    <paper-input-container auto-validate>
                        <label>Nom d'utilisateur :</label>
                        <input is="iron-input" name="user" pattern="^[a-zA-Z0-9-_.]{4,14}$">
                        <paper-input-error>nom d'utilisateur invalide</paper-input-error>
                    </paper-input-container>

                    <paper-input-container auto-validate>
                        <label>Mot de passe :</label>
                        <input is="iron-input" name="password" pattern="^[a-zA-Z0-9²&~#-_^@$*!?+.]{8,12}$">
                        <paper-input-error>mot de passe invalide</paper-input-error>
                    </paper-input-container>

                    <paper-button id="btn_submit_admin">Envoyer</paper-button>
                </form>
            </div>
        </div>
    </body>
</html>