<?php
/**
 * Created by PhpStorm.
 * User: Antonio Luca
 * Date: 02/01/2016
 * Time: 15:43
 */


include_once MODEL_DIR . "SessioneModel.php";
include_once MODEL_DIR . "UtenteModel.php";
include_once MODEL_DIR . "TestModel.php";
include_once MODEL_DIR . "DomandaModel.php";
include_once BEAN_DIR . "Sessione.php";

$sessioneModel = new SessioneModel();
$utenteModel = new UtenteModel();
$domandaModel = new DomandaModel();
$testModel = new TestModel();
$idCorso = $_URL[2];
$idSessione=$_URL[4];
$allungA=null;
if(isset($_URL[6]))
    $allungA=$_URL[6];

$ses = $sessioneModel->readSessione($idSessione);
$dataFineNow=$allungA;
$newSessione = new Sessione($ses->getDataInizio(), $dataFineNow, $ses->getSogliaAmmissione(), "In esecuzione", $ses->getTipologia(), $idCorso);
$sessioneModel->updateSessione($idSessione,$newSessione);
$vaiASesInCorso = "Location: " . "/docente/corso/" . $idCorso . "/sessione" . "/" . $idSessione . "/" . "sessioneincorso/show/successmodifica";
header($vaiASesInCorso);

