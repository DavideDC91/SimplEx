<?php

/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 22/11/15
 * Time: 19:17
 */
include_once MODEL_DIR . "TestModel.php";
include_once MODEL_DIR . "AlternativaModel.php";
include_once MODEL_DIR . "AccountModel.php";

class TestController {
    
    private $testModel;

    public function __construct() {
        $this->testModel = new TestModel();
    }
    
    public function creaTest($test) {        
        return $this->testModel->createTest($test);
    }  
    
    //Restituisce tutti i test
    public function getAllTest() {
        return $this->testModel->getAllTest();
    }
    
    //ricerca un test attraverso l'a matricola'id
    public function readTest($id){
        return $this->testModel->readTest($id);
    }
    
    public function updateTest($id,$idnuovotest){
        return $this->testModel->updateTest($id,$idnuovotest);
    }
    
    //ricerca i test relativi ad un corso
    public function getAllTestbyCorso($id) {
        return $this->testModel->getAllTestByCorso($id);
    }
    
    //ricerca i test relativi ad un corso
    public function getAllTestBySessione($id) {
        return $this->testModel->getAllTestBySessione($id);
    }
    
    //rimuovi test
    public function deleteTest($id){
        return $this->testModel->deleteTest($id);
    }


    
    
    
    //SPOSTARE!!!

    //restituisce le risposte multiple di una specifica domanda
    public function getRispMult($id, $argomentoId, $argomentoCorsoId) {
        $alternativaModel = new AlternativaModel();
        return $alternativaModel->getAllAlternativaByDomanda($id, $argomentoId, $argomentoCorsoId);
    }
    
    //ricerca un utente attraverso la matricola
    public function getUtentebyMatricola($matricola) {
        $accountModel = new AccountModel();
        return $accountModel->getUtenteByMatricola($matricola);
    }
}