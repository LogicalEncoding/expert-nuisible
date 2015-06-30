<?php
    if ($check == "complet") {
        // Déclaration de l'adresse de destination
        $mail = 'sarlhss@hotmail.com';
        if (!preg_match("#^[a-z0-9._-]+@[a-z]{1,}.[a-z]{2,4}$#", $mail)) $passage_ligne = "\r\n";
        else $passage_ligne = "\n";

        // Remplissage de l'entete
        $pre_header         = "Une demande de devis vient d'être envoyée depuis le site Expert-Nuisible.";
        $pre_underHeader    = "Informations concernant le demandeur :";

        // Type de prestation
        $pre_prestation = "Prestation(s) désirée(s) par le client :";
        if($deratisation) $pre_prestation       .= '<br />- Dératisation';
        if($punaises) $pre_prestation           .= '<br />- Traitement de punaises';
        if($cafards) $pre_prestation            .= '<br />- Traitement de cafards';
        if($desinsectisation) $pre_prestation   .= '<br />- Désinsectisation';
        if($autre) $pre_prestation              .= '<br />- Autre';

        // Adresse
        $pre_adresse = "Adresse : " . $adresse;

        // Remarque
        $pre_message = "Commentaire laisser par le client : " . $remarque;
        
        //=====Déclaration des messages au format texte et au format HTML.
        $message_txt    = $pre_header . $pre_underHeader . "Nom : " . $nom . "Prenom : " . $prenom . $pre_adresse . "Téléphone : " . $phone . "Email : " . $email . $pre_prestation . "Surface : " . $surface . $pre_message;
        $message_html   = "<html><head></head><body>" . $pre_header . "<br />" . $pre_underHeader . "<br /><br />Nom : " . $_POST['nom'] . "<br />Prénom : " . $_POST['prenom'] . "<br />" . $pre_adresse . "<br />Téléphone : " . $_POST['phone'] . "<br />Email : " . $_POST['email'] . "<br />" . $pre_prestation . "<br />Surface : " . $_POST['surface'] . "<br />" . $pre_message . "<br /></body></html>";

        //=====Création de la boundary
        $boundary = "-----=" . md5(rand());
         
        //=====Définition du sujet.
        $sujet = "[DEVIS] Expert-Nuisible: Demande de devis";
         
        //=====Création du header de l'e-mail.
        $header = "From: \"" . $nom . "\"<" . $email . ">" . $passage_ligne;
        $header .= "Reply-to: \"" . $nom . "\" <" . $email . ">" . $passage_ligne;
        $header .= "MIME-Version: 1.0" . $passage_ligne;
        $header .= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;
         
        //=====Création du message.
        $message = $passage_ligne . "--" . $boundary . $passage_ligne;

        //=====Ajout du message au format texte.
        $message .= "Content-Type: text/plain; charset=\"ISO-8859-1\"" . $passage_ligne;
        $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
        $message .= $passage_ligne . $message_txt . $passage_ligne;
        $message .= $passage_ligne . "--" . $boundary . $passage_ligne;

        //=====Ajout du message au format HTML
        $message .= "Content-Type: text/html; charset=\"ISO-8859-1\"" . $passage_ligne;
        $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
        $message .= $passage_ligne . $message_html . $passage_ligne;
        $message .= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;
        $message .= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;
         
        //=====Envoi de l'e-mail.
        mail($mail, $sujet, $message, $header);
        echo '<p class="form_warning">La demande de devis a bien été envoyée. Nous vous en remercions.<br />Vous allez être contacté dans les plus bref délais.</p>';
    } else {
        if ($check == "partiel") {
            /*echo '<p class="form_warning">Des champs sont manquants ou incorrectes. Merci de les compléter.</p>'; */
        }
        
        $form = '
        <form is="iron-form" id="form" method="post" action="index.php">
            <paper-input label="Nom" value="' . $nom . '" name="nom" auto-validate pattern="[a-zA-Z- ]*" error-message="caractère non valide"></paper-input>
            <paper-input label="Prénom" value="' . $prenom . '" name="prenom" auto-validate pattern="[a-zA-Z- ]*" error-message="caractère non valide"></paper-input>
            <paper-input label="Adresse" value="' . $adresse . '" name="adresse" auto-validate pattern="[0-9a-zA-Z- ]*" error-message="caractère non valide"></paper-input>
            <paper-input label="Téléphone" value="' . $phone . '" name="phone" char-counter auto-validate pattern="[0-9]{10}" error-message="caractère manquant ou non valide" minlength="10" maxlength="10"></paper-input>
            <paper-input label="Email" value="' . $email . '" name="email" auto-validate pattern="^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$" error-message="adresse non valide"></paper-input>
            
            <label for="deratisation">Nature de l\'interventtion : </label><br />
            <paper-checkbox name="deratisation"> dératisation</paper-checkbox>
        </form>';

        echo $form;
    }
?>

<!--
<input type="checkbox" name="deratisation" id="deratisation" /><label for="deratisation">Dératisation</label><br />
<input type="checkbox" name="punaises" id="punaises" /><label for="punaises">Traitement punaises de lit</label><br />
<input type="checkbox" name="cafards" id="cafards" /><label for="cafards">Traitement cafards</label><br />
<input type="checkbox" name="desinsectisation" id="desinsectisation" /><label for="desinsectisation">Désinsectisation</label><br />
<input type="checkbox" name="autre" id="autre" /><label for="autre">Autre</label>

<TD>Surface à traiter</TD>
<TD><INPUT type="text" size="40" name="surface" value="' . $surface . '" /></TD>

<TD>Remarque</TD>
<TD><TEXTAREA rows="4" cols="50" name="remarque" value="' . $remarque . '"></TEXTAREA></TD>

<TD COLSPAN=2><INPUT type="submit" value="Envoyer" /></TD>
-->