<?php

/**
 * Created by PhpStorm.
 * User: Fabiano Pecorelli
 * Date: 29/11/2015
 * Time: 15:58
 */

include_once MODEL_DIR . "ElaboratoModel.php";


class ElaboratoController {   //UTLIZZARE ALTRO CONTROLLER..NON ALTRO MODEL


    private $elaboratoModel;

    public function __construct() {
        $this->elaboratoModel = new ElaboratoModel();
    }
    
    public function createElaborato($elaborato){
        return $this->elaboratoModel->createElaborato($elaborato);
    }
    
    public function updateElaborato($studenteMatricola,$sessioneId,$updatedElaborato){
        return $this->elaboratoModel->updateElaborato($studenteMatricola,$sessioneId,$updatedElaborato);
    }

    public function readElaborato($studenteMatricola,$sessioneId) {
        return $this->elaboratoModel->readElaborato($studenteMatricola,$sessioneId);
    }
    
}