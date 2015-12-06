<?php
/**.
 * User: Carlo
 * Date: 30/11/15
 * Time: 20:00
 */

include_once CONTROL_DIR . "Controller.php";
include_once MODEL_DIR . "RispostaApertaModel.php";


class RispostaApertaController extends Controller
{

     public function __construct() {
         $this->rispApertaModel = new RispostaApertaModel();
     }

    public function createRispostaAperta($risposta){
        return $this->rispApertaModel->createRispostaAperta($risposta);
    }
    
     public function updateRispostaAperta($updatedRisposta, $elaboratoSessioneId, $elaboratoStudenteMatricola, $domandaApertaId){
        return $this->rispApertaModel->updateRispostaApertaupdateRispostaAperta($updatedRisposta, $elaboratoSessioneId, $elaboratoStudenteMatricola, $domandaApertaId);
     }
    
     public function readRispostaAperta($elaboratoSessioneId, $elaboratoStudenteMatricola, $domandaApertaId){
         return $this->rispApertaModel->readRispostaApertareadRispostaAperta($elaboratoSessioneId, $elaboratoStudenteMatricola, $domandaApertaId);
     }

}