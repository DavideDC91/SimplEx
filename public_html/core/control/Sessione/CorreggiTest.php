<?php
/**
 * Questo Control permette al docente di correggere un test.
 * @author Antonio Luca D'Avanzo
 * @version 1
 * @since  31/12/2015 00:46
 */
include_once MODEL_DIR . "ElaboratoModel.php";
include_once MODEL_DIR . "SessioneModel.php";
include_once MODEL_DIR . "AlternativaModel.php";
include_once MODEL_DIR . "RispostaApertaModel.php";
include_once MODEL_DIR . "RispostaMultiplaModel.php";
include_once MODEL_DIR . "DomandaModel.php";
include_once MODEL_DIR . "UtenteModel.php";
include_once MODEL_DIR . "CdLModel.php";
include_once MODEL_DIR . "CorsoModel.php";
include_once MODEL_DIR . "TestModel.php";
include_once BEAN_DIR . "Sessione.php";

$sessioneModel = new SessioneModel();
$utenteModel = new UtenteModel();
$testModel = new TestModel();
$corsoModel = new CorsoModel();
$cdlModel = new CdLModel();
$elaboratoModel= new ElaboratoModel();
$modelDomanda = new DomandaModel();
$modelAlternativa = new AlternativaModel();
$modelRispostaAperta = new RispostaApertaModel();
$modelRispostaMultipla = new RispostaMultiplaModel();

$cdl = null;
$corso = null;
$docenteassociato = Array();
$sessione = null;
$test = null;
$elaborato = null;
$studente = null;
$max=null;
$dom=null;
$multiple = Array();
$aperte = Array();
$alternative = Array();
//$corretta = null;
$rispostaaperta = null;
$rispostamultipla = null;
$i = 0;
$url = null;
$url2 = null;
$matricola = $_URL[6];
$url = $_URL[2];
$url2 = $_URL[4];
$studente=$utenteModel->getUtenteByMatricola($matricola);

try {
    $corso = $corsoModel->readCorso($url);
} catch (ApplicationException $ex) {
    echo "<h1>INSERIRE ID CORSO NEL PATH!</h1>" . $ex;
}

try {
    $elaborato = $elaboratoModel->readElaborato($studente->getMatricola(), $url2);
} catch (ApplicationException $ex) {
    echo "<h1>READELABORATO FALLITO!</h1>" . $ex;
}

try {
    $cdl = $cdlModel->readCdl($corso->getCdlMatricola());
} catch (ApplicationException $ex) {
    echo "<h1>READCDL FALLITO!</h1>" . $ex;
}
try {
    $docenteassociato = $utenteModel->getAllDocentiByCorso($corso->getId());
} catch (ApplicationException $ex) {
    echo "<h1>GETDOCENTIASSOCIATI FALLITO</h1>" . $ex;
}
try {
    $sessione = $sessioneModel->readSessione($url2);
} catch (ApplicationException $ex) {
    echo "<h1>INSERIRE ID SESSIONE NEL PATH!</h1>" . $ex;
}
try {
    $test = $testModel->readTest($elaborato->getTestId());
} catch (ApplicationException $ex) {
    echo "<h1>READTEST FALLITO!</h1>" . $ex;
}
try {
    $multiple = $modelDomanda->getAllDomandeMultipleByTest($test->getId());
} catch (ApplicationException $ex) {
    echo "<h1>GETALLDOMANDEMULTIPLEBYTEST FALLITO!</h1>" . $ex;
}
try {
    $aperte = $modelDomanda->getAllDomandeAperteByTest($test->getId());
} catch (ApplicationException $ex) {
    echo "<h1>GETALLDOMANDEAPERTEBYTEST FALLITO!</h1>" . $ex;
}


if (isset($_POST['salva'])){
    $fin = $elaborato->getEsitoParziale();
    foreach ($aperte as $ap){
        $apId = $ap->getId();
        $punt = $_GET['sel-'.$apId.''];
        $fin = $fin + $punt;
        $rispAp = $modelRispostaAperta->readRispostaAperta($url2, $matricola, $apId);
        $rispAp->setPunteggio($punt);
        $modelRispostaAperta->updateRispostaAperta($rispAp, $url2, $matricola, $apId);
    }
    $elaborato->setEsitoFinale($fin);

    $updated = $test;
    $soglia = $sessione->getSogliaAmmissione();
    $tipologia = $sessione->getTipologia();
    if ($fin >= $soglia){
        if ($tipologia == "Valutativa"){
            $perc = $updated->getPercentualeSuccessoVal() +1;
            $updated->setPercentualeSuccessoVal($perc);
        }
        else{
            $perc = $updated->getPercentualeSuccessoEse() +1;
            $updated->setPercentualeSuccessoEse($perc);
        }    
        $testModel->updateTest($elaborato->getTestId(), $updated);
    }

    $elaborato->setStato("Corretto");
    $elaboratoModel->updateElaborato($matricola,$url2,$elaborato);
    header("Location: "."/docente/corso/".$corso->getId()."/sessione"."/".$sessione->getId()."/"."esiti/show");
}