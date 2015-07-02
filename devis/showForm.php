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
        if($deratisation != "") $pre_prestation       .= '<br />- Dératisation';
        if($punaises != "") $pre_prestation           .= '<br />- Traitement de punaises';
        if($cafards != "") $pre_prestation            .= '<br />- Traitement de cafards';
        if($desinsectisation != "") $pre_prestation   .= '<br />- Désinsectisation';
        if($autre != "") $pre_prestation              .= '<br />- Autre';

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
            <paper-input-container auto-validate>
                <label>Nom</label>
                <input is="iron-input" name="nom" value="' . $nom . '" pattern="[a-zA-Z- ]*">
                <paper-input-error>caractère non valide</paper-input-error>
            </paper-input-container>

            <paper-input-container auto-validate>
                <label>Prénom</label>
                <input is="iron-input" name="prenom" value="' . $prenom . '" pattern="[a-zA-Z- ]*">
                <paper-input-error>caractère non valide</paper-input-error>
            </paper-input-container>

            <paper-input-container auto-validate>
                <label>Adresse</label>
                <input is="iron-input" name="adresse" value="' . $adresse . '" pattern="[0-9a-zA-Z- ]*">
                <paper-input-error>caractère non valide</paper-input-error>
            </paper-input-container>

            <paper-input-container auto-validate>
                <label>Téléphone</label>
                <input is="iron-input" name="phone" value="' . $phone . '" pattern="[0-9. ]*">
                <paper-input-error>caractère manquant ou non valide</paper-input-error>
                <paper-input-char-counter></paper-input-char-counter>
            </paper-input-container>

            <paper-input-container auto-validate>
                <label>E-mail</label>
                <input is="iron-input" name="mail" value="' . $email . '" pattern="^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$">
                <paper-input-error>e-mail non valide</paper-input-error>
            </paper-input-container>

            <label>Nature de l\'interventtion :</label><br />
            <input type="checkbox" name="deratisation" id="deratisation" ' . $deratisation . '/><label for="deratisation">Dératisation</label><br />
            <input type="checkbox" name="punaises" id="punaises" ' . $punaises . '/><label for="punaises">Traitement punaises de lit</label><br />
            <input type="checkbox" name="cafards" id="cafards" ' . $cafards . '/><label for="cafards">Traitement cafards</label><br />
            <input type="checkbox" name="desinsectisation" id="desinsectisation" ' . $desinsectisation . '/><label for="desinsectisation">Désinsectisation</label><br />
            <input type="checkbox" name="autre" id="autre" ' . $autre . '/><label for="autre">Autre</label><br />

            <paper-input-container auto-validate>
                <label>Surface à traiter</label>
                <input is="iron-input" name="surface" value="' . $surface . '" pattern="[0-9]{1,5}[a-zA-Z² ]*">
                <paper-input-error>caractère non valide</paper-input-error>
            </paper-input-container>
            
            <paper-textarea name="remarque" label="Remarque" value="' . $remarque . '"></paper-textarea>

            
            
            <paper-button id="btn_submit">Envoyer</paper-button>
        </form>';
        echo $form;
    }
?>



<!--
<paper-textarea name="remarque" label="Remarque" value="' . $remarque . '"></paper-textarea>

<input type="checkbox" name="deratisation" id="deratisation" ' . $deratisation . '/><label for="deratisation">Dératisation</label><br />
<input type="checkbox" name="punaises" id="punaises" ' . $punaises . '/><label for="punaises">Traitement punaises de lit</label><br />
<input type="checkbox" name="cafards" id="cafards" ' . $cafards . '/><label for="cafards">Traitement cafards</label><br />
<input type="checkbox" name="desinsectisation" id="desinsectisation" ' . $desinsectisation . '/><label for="desinsectisation">Désinsectisation</label><br />
<input type="checkbox" name="autre" id="autre" ' . $autre . '/><label for="autre">Autre</label><br />
<paper-button id="btn_submit">Envoyer</paper-button>

<TD>Surface à traiter</TD>
<TD><INPUT type="text" size="40"  value="' . $surface . '" /></TD>

<TD>Remarque</TD>
<TD><TEXTAREA rows="4" cols="50" name="remarque" value="' . $remarque . '"></TEXTAREA></TD>

<paper-checkbox name="deratisation" id="deratisation" ' . $deratisation_checked . '>dératisation</paper-checkbox>
-->