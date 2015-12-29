<?php
/**
 * Created by PhpStorm.
 * User: pasquale
 * Date: 29/12/15
 * Time: 15.20
 */

include_once MODEL_DIR . "DomandaModel.php";
$domandaModel = new DomandaModel();

$idArgomento = $_POST['idargomento'];
$idCorso = $_POST['idcorso'];
$idDomanda = $_POST['iddomanda'];


if (isset($_POST['testoDomanda']) && isset($_POST['punteggioEsatta'])) {

    $testo = $_POST['testoDomanda'];
    $punteggio = $_POST['punteggioEsatta'];

    if(strlen($testo)<2 || strlen($testo)>500){
        $_SESSION['errore'] = 1;
        header('Location: /docente/corso/' .$idcorso.'/argomento/domande/modificaaperta/'. $idArgomento.'/'.$idDomanda);
    }
    else if($punteggio<0){
        $_SESSION['errore'] = 2;
        header('Location: /docente/corso/' .$idcorso.'/argomento/domande/modificaaperta/'. $idArgomento.'/'.$idDomanda);
    }else {
        $updatedDomanda = new DomandaAperta($idArgomento, $testo, $punteggio, 0);
        $domandaModel->updateDomandaAperta($idDomanda, $updatedDomanda);
        header('Location: /docente/corso/' . $idCorso . '/argomento/domande/' . $idArgomento . '/successmodifica');
    }
}