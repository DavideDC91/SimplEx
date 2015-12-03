<?php

/**
 * Created by PhpStorm.
 * User: Antonio Luca
 * Date: 29/11/2015
 * Time: 15:58
 */

include_once CONTROL_DIR . "Controller.php";
include_once MODEL_DIR . "Model.php";
include_once MODEL_DIR . "AccountModel.php";
include_once MODEL_DIR . "SessioneModel.php";
include_once BEAN_DIR . "Sessione.php";
include_once MODEL_DIR . "TestModel.php";


class SessioneController extends Controller {   //UTLIZZARE ALTRO CONTROLLER..NON ALTRO MODEL


    private $sessioneModel;
    private $accountModel;
    private $testModel;
    private $accountController;
    private $testController;

    public function __construct() {
        $this->sessioneModel = new SessioneModel();
        $this->accountModel = new AccountModel();
        $this->testModel = new TestModel();

    }

    /**
     * Ritorna tutti i testi associati al id relativo alla sessione
     * @param type $idSessione
     * @return type array di Test
     */
    public function getAllTestBySessione($idSessione) {
        return $this->testModel->getAllTestBySessione($idSessione);
    }

    /**
     * Ritorna tutti gli studenti associati al id relativo alla sessione
     * @param type $idSessione
     * @return type array di Studenti
     */
    public function getAllStudentiBySessione($idSessione) {
        return  $this->accountModel->getAllStudentiSessione($idSessione);
    }

    /**
     * Crea una nuova sessione
     * @param type $sessione ovvero Una Sessione
     */
    public function creaSessione($sessione) {          //verrà chiamato premuto il salva button..sessione è un bean..con diverse variabili..
        return $this->sessioneModel->createSessione($sessione);     //che verranno aggiunte nella view... stile :  $cdl = new CdL($matricola, $nome, $tipologia);
    }                                                       //e poi passate a questo control! ..toglierò questi commenti, promesso XD

    /**
     *
     * @param type $id E' l'id della sessione che è stata appena modificata
     * @param type $updatedSessione E' la nuova sessione appena creata
     */
    public function updateSessione($id, $updatedSessione) {     //verrà chiamato premuto il salva button
        $this->sessioneModel->updateSessione($id, $updatedSessione);
    }


    /**
     * Restiuisce i dati relativi ad una sessione
     * @param type $idSessione
     * @return type
     */
    public function readSessione($idSessione) {   //funziona chiamata quando si accede a questa pagina per caricare i dati
        return $this->sessioneModel->readSessione($idSessione);
    }

    /**
     * Rimuove una sessione
     * @param type $idSessione
     */
    public function deleteSessione($idSessione) {
        $this->sessioneModel->deleteSessione($idSessione);
    }

    public function getAllSessioni() {
        return $this->sessioneModel->getAllSessioni();
    }


        public function getAllStudentiByCorso($idCorso) {
        return $this->accountModel->getAllStudentiByCorso($idCorso);
    }

    public function getAllSessioniByCorso($idCorso) {
        return $this->sessioneModel->getAllSessioniByCorso($idCorso);
    }

    public function getAllSessioniByStudente($matricola) {
        return $this->sessioneModel->getAllSessioniByStudente($matricola);
    }

    public function getAllTestByCorso($idCorso) {
        return $this->testModel->getAllTestByCorso($idCorso);
    }

    public function associaTestASessione($idSes, $idTest) {
            $this->sessioneModel->associaTestSessione($idSes,$idTest);
    }

    public function deleteAllTestFromSessione($idSes) {
        $this->sessioneModel->DeleteAllTestFromSessione($idSes);
    }


}