<?php
/**
 * Created by PhpStorm.
 * User: Pasquale
 * Date: 29/12/15
 * Time: 10.40
 */

include_once MODEL_DIR . "DomandaModel.php";
include_once MODEL_DIR . "AlternativaModel.php";

$domandaModel = new DomandaModel();
$alternativaMoodel = new AlternativaModel();


if (isset($_POST['testoDomanda']) && isset($_POST['punteggioErrata']) && isset($_POST['punteggioEsatta']) && isset($_POST['testoRisposta']) && isset($_POST['radio'])) {

    $idArgomento = $_POST['idargomento'];
    $idCorso = $_POST['idcorso'];
    $testoDomanda = $_POST['testoDomanda'];
    $punteggioErrata = $_POST['punteggioErrata'];
    $punteggioEsatta = $_POST['punteggioEsatta'];
    $testoRisposte = $_POST['testoRisposta'];
    $radio = $_POST['radio'];

    $nuovaDomanda = new DomandaMultipla($idArgomento, $testoDomanda, $punteggioEsatta, $punteggioErrata, 0, 0);

    $idNuovaDomanda = $domandaModel->createDomandaMultipla($nuovaDomanda);
    for ($i = 0; $i < count($testoRisposte); $i++) {
        if (($i + 1) == $radio) {
            $corretta = "Si";
        } else {
            $corretta = "No";
        } if($testoRisposte[$i] == '' || $testoRisposte[$i] == null){
            echo $i;
            continue;
        }else {
            $alternativa = new Alternativa($idNuovaDomanda, $testoRisposte[$i], 0, $corretta);
        }

        $alternativaModel->creaAlternativa($alternativa);
    }

    header('Location: /docente/corso/'. $idCorso .'/argomento/domande/'. $idArgomento .'/successinserimento');
}
?>