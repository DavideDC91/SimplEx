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
$flag = 0;
if (!is_numeric($sessId)) {
    $flag = 1;
}
$corsoId = $_REQUEST["corsoId"];
if (!is_numeric($corsoId)) {
    $flag = 1;
}
$matricola = $_SESSION['user']->getMatricola();

if ($flag == 0){
    try {
        $elaborato = $elaboratoModel->readElaborato($matricola, $sessId);
    } catch (ApplicationException $ex) {
        $elaborato = null;
    }

    if ($elaborato != null && $elaborato->getStato() == "Non corretto") {
        $elaborato->setEsitoParziale(0);
        $elaborato->setEsitoFinale(0);
        $elaborato->setStato("Corretto");
        $elaboratoModel->updateElaborato($matricola, $sessId, $elaborato);
    }

}