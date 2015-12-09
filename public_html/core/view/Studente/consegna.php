<?php
/**
 * Created by NetBeans.
 * User: Fabiano
 * Date: 03/12/15
 * Time: 16:00
 */
include_once CONTROL_DIR . "ElaboratoController.php";
include_once CONTROL_DIR . "DomandaController.php";
include_once CONTROL_DIR . "AlternativaController.php";
include_once CONTROL_DIR . "RispostaMultiplaController.php";
include_once BEAN_DIR . "Elaborato.php";
       
    $elCon = new ElaboratoController();
    $domCon = new DomandaController();
    $rmCon = new RispostaMultiplaController();
    $altCon = new AlternativaController();
    
    $sessioneId = $_REQUEST["sessId"];
    $studenteMatricola = $_REQUEST["mat"];
    $elaborato = $elCon->readElaborato($studenteMatricola,$sessioneId);
    
    $rispMul = $rmCon->getMultipleByElaborato($elaborato);
    $punteggio = 0;
    foreach ($rispMul as $rm) {
        $dom = $domCon->getDomandaMultipla($rm->getDomandaMultiplaId());
        $puntCor = $dom->getPunteggioCorretta();
        $puntErr = $dom->getPunteggioErrata();
        $altCor = $altCon->getAlternativaCorrettaByDomanda($rm->getDomandaMultiplaId());
        if ($rm->getAlternativaId() != 0)
            if ($altCor->getId() == $rm->getAlternativaId())
                $punteggio = $punteggio + $puntCor;
            else 
                $punteggio = $punteggio + $puntErr;
    }
    $elaborato->setEsitoParziale($punteggio);
    
    $elCon->updateElaborato($studenteMatricola,$sessioneId,$elaborato);
    
    