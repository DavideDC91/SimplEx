<?php
/**
 * Controller che permette di creare una Domanda Aperta
 * @author Carlo, Pasquale
 * @version 1.3
 * @since 27/12/15 13:38
 */


include_once MODEL_DIR . "DomandaModel.php";
$domandaModel = new DomandaModel();


if(isset($_POST['testoDomanda']) && isset($_POST['punteggioEsatta']) && isset($_POST['idargomento'])) {
    $idArgomento = $_POST['idargomento'];
    $idcorso = $_POST['idcorso'];
    $testoDomanda = $_POST['testoDomanda'];
    $punteggioEsatta = $_POST['punteggioEsatta'];
    if(strlen($testoDomanda)<2 || strlen($testoDomanda)>500){
        $_SESSION['errore'] = 1;
        header('Location: /docente/corso/' .$idcorso.'/argomento/domande/inserisciaperta/'. $idArgomento);
    }
    else if($punteggioEsatta<=0){
        $_SESSION['errore'] = 2;
        header('Location: /docente/corso/' .$idcorso.'/argomento/domande/inserisciaperta/'. $idArgomento);
    }else {
        $testoEncoded = base64_encode(strip_tags($testoDomanda));
        $domandaAperta = new DomandaAperta($idArgomento, $testoEncoded, $punteggioEsatta, 0, 0);
        $domandaModel->createDomandaAperta($domandaAperta);
        header('Location: /docente/corso/' . $idcorso . '/argomento/domande/' . $idArgomento . '/successinserimento');
    }
}else if(!isset($_POST['testoDomanda'])){
    $_SESSION['errore'] = 1;
    header('Location: /docente/corso/' .$idcorso.'/argomento/domande/inserisciaperta/'. $idArgomento);
}else if(!isset($_POST['punteggioEsatta'])){
    $_SESSION['errore'] = 2;
    header('Location: /docente/corso/' .$idcorso.'/argomento/domande/inserisciaperta/'. $idArgomento);
}else if(!isset($_POST['idargomento'])){
    header('Location: /docente/corso/' .$idcorso.'/argomento/domande/inserisciaperta/'. $idArgomento);
}