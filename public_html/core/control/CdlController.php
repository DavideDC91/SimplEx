<?php
/**
 * Created by PhpStorm.
 * User: fede_dr
 * Date: 24/11/15
 * Time: 17:44
 */

include_once CONTROL_DIR . "Controller.php";
include_once BEAN_DIR . "CdL.php";
include_once BEAN_DIR . "Corso.php";
include_once MODEL_DIR . "CdLModel.php";
include_once MODEL_DIR . "CorsoModel.php";

class CdlController extends Controller {

    /**
     * Restituisco tutti i CdL
     * @return array CdL
     */
    public function getCdl() {
        $cdlModel = new CdLModel();
        return $cdlModel->getAllCdL();
    }

    /**
     * Restituisco tutti i Corsi
     * @return array Corso
     */
    public function getCorsi() {
        $corsoModel = new CorsoModel();
        return $corsoModel->getAllCorsi();
    }

    /**
     * Crea un nuovo cdl
     * @param un CdL
     */
    public function creaCdl($cdl) {
        $cdlModel = new CdLModel();
        $cdlModel->createCdL($cdl);
    }

    /**
     * Crea un nuovo corso
     * @param un Corso
     */
    public function creaCorso($corso) {
        $corsoModel = new CorsoModel();
        $corsoModel->createCorso($corso);
    }

    /**
     * Modifica un cdl
     * @param matricola CdL da modificare
     * @param un CdL modificato
     */
    public function modificaCdl($matricola, $cdl){
        $cdlModel = new CdLModel();
        $oldCdl = $cdlModel->readCdL($matricola);
        $cdlModel->updateCdL($oldCdl->getMatricola(), $cdl);
    }

    /**
     * Modifica un corso
     * @param un Corso
     */
    public function modificaCorso($matricola, $corso){
        $corsoModel = new CorsoModel();
        $oldCorso = $corsoModel->readCorso($matricola);
        $corsoModel->updateCorso($oldCorso->getMatricola(), $corso);
    }

    /**
     * Restituisco un corso
     * @param un Corso
     */
    public function visualizzaCorso($corso) {
        $corsoModel = new CorsoModel();
        $corsoModel->readCorso($corso->getMatricola());
    }

    /**
     * Restituisco i corsi di un cdl
     * @return array di Corsi di un cdl
     */
    public function getCorsiCdl($cdl) {
        $corsoModel = new CorsoModel();
        return $corsoModel->getAllCorsiCdl($cdl->getMatricola());
    }
}