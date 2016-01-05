<?php

/**
 * Controller per il ritiro di uno studente da una sessione
 *
 * @author Fabiano Pecorelli
 * @version 1.0
 * @since 03/12/15
 */

include_once MODEL_DIR . "ElaboratoModel.php";
    $elaboratoModel = new ElaboratoModel();
    $sessId = $_REQUEST["sessId"];
    $corsoId = $_REQUEST["corsoId"];
    $matricola = $_SESSION['user']->getMatricola();
    try{
        $elaborato = $elaboratoModel->readElaborato($matricola,$sessId);
    }
    catch(ApplicationException $ex){
        $elaborato = null;
    }

    if ($elaborato != null && $elaborato->getStato() == "Non corretto"){
        $elaborato->setEsitoParziale(0);
        $elaborato->setEsitoFinale(0);
        $elaborato->setStato("Corretto");
        $elaboratoModel->updateElaborato($matricola,$sessId,$elaborato);   
    }
    
    header("Location: /studente/corso/".$corsoId);