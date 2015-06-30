<?php
    if(!isset($_GET['postal']) || !isset($_GET['dep']) || !isset($_GET['ville']) ) {
        $_GET['ville']  = "Paris";
        $_GET['postal'] = "75000";
        $_GET['dep']    = "Paris";
    }

    function checkText ($pParagraphe) {
        $pParagraphe = str_replace('[VILLE]', $_GET['ville'], $pParagraphe);
        $pParagraphe = str_replace('[CODEPOSTAL]', $_GET['postal'], $pParagraphe);
        $pParagraphe = str_replace('[DEPARTEMENT]', $_GET['dep'], $pParagraphe);
        return $pParagraphe;
    }
?>