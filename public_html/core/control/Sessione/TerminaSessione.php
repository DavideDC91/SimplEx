<?php
/**
 * Questo Control permette al docente di terminare una sessione manualmente.
 * @author Antonio Luca D'Avanzo
 * @version 1
 * @since  30/12/2015 22:53
 */
include_once MODEL_DIR . "SessioneModel.php";
$modelSessione = new SessioneModel();
include_once BEAN_DIR . "Sessione.php";

$idSessione="";
$idSessione= $_URL[4];
if (!is_numeric($idSessione)) {
    echo "<script type='text/javascript'>alert('errore nella url!!!');</script>";
}
$identificativoCorso ="";
$identificativoCorso = $_URL[2];
if (!is_numeric($identificativoCorso)) {
    echo "<script type='text/javascript'>alert('errore nella url!!!');</script>";
}

$sessione=$modelSessione->readSessione($idSessione);
$dataFrom=$sessione->getDataInizio();
$soglia=$sessione->getSogliaAmmissione();
$tipoSessione=$sessione->getTipologia();
$dataNow=date('y-m-d H:i:s', time());
$newSessione = new Sessione($dataFrom, $dataNow, $soglia, "Eseguita", $tipoSessione, $identificativoCorso);
$modelSessione->updateSessione($idSessione,$newSessione);
$vaiVisuEsiti= "Location: "."/docente/corso/".$identificativoCorso."/sessione"."/".$idSessione."/"."esiti/show";
header($vaiVisuEsiti);
