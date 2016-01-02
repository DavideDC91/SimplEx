<?php
/**
 * Created by PhpStorm.
 * User: Antonio Luca
 * Date: 31/12/2015
 * Time: 16:18
 */

include_once MODEL_DIR . "UtenteModel.php";
$modelUtente = new UtenteModel();
include_once MODEL_DIR . "SessioneModel.php";
$modelSessione = new SessioneModel();
include_once MODEL_DIR . "CdLModel.php";
$modelCdl = new CdLModel();
include_once MODEL_DIR . "CorsoModel.php";
$modelCorso = new CorsoModel();
include_once MODEL_DIR . "TestModel.php";
$testModel = new TestModel();
include_once MODEL_DIR . "ElaboratoModel.php";
$modelElaborato = new ElaboratoModel();
$idCorso = $_URL[2];
$idSessione = $_URL[4];
$maxFromSelect=-9999;
if(isset($_URL[7]))
    $maxFromSelect = $_URL[7];
$vai="";
if(isset($_URL[6]))
    $vai = $_URL[6];
if($vai=="vai") {

    $_SESSION['abi']=false;

    echo "<div id=\"divTest\" class=\"portlet-body\">
                                <div id=\"tabella_test_wrapper\" class=\"dataTables_wrapper no-footer\" >
                                    <table class=\"table table-striped table-bordered table-hover dataTable no-footer\" id=\"tabella_test\" role=\"grid\" aria-describedby=\"tabella_studenti_info\">
                                        <thead>
                                            <tr role=\"row\">
                                                <th class=\"table-checkbox sorting_disabled\" rowspan=\"1\" colspan=\"1\" aria-label=\"
                                                    \" style=\"width: 24px;\">
                                                    <input type=\"checkbox\" class=\"group-checkable\" data-set=\"#tabella_test .checkboxes\">
                                                </th>
                                                <th class=\"sorting-disabled\" tabindex=\"0\" aria-controls=\"sample_2\" rowspan=\"1\" colspan=\"1\" aria-label=\"
                                                    Email
                                                    : activate to sort column ascending\" style=\"width: 106px;\">
    Nome
                                                </th><th class=\"sorting-disabled\" tabindex=\"0\" aria-controls=\"sample_2\" rowspan=\"1\" colspan=\"1\" aria-label=\"
                                                         Email
                                                         : activate to sort column ascending\" style=\"width: 181px;\">
    Descrizione
                                                </th>
                                                <th class=\"sorting-disabled\" tabindex=\"0\" aria-controls=\"sample_2\" rowspan=\"1\" colspan=\"1\" aria-label=\"
                                                    Email
                                                    : activate to sort column ascending\" style=\"width: 181px;\">
    N° Multiple
</th>
                                                <th class=\"sorting-disabled\" tabindex=\"0\" aria-controls=\"sample_2\" rowspan=\"1\" colspan=\"1\" aria-label=\"
                                                    Email
                                                    : activate to sort column ascending\" style=\"width: 181px;\">
    N° Aperte
</th>
                                                <th class=\"sorting-disabled\" tabindex=\"0\" aria-controls=\"sample_2\" rowspan=\"1\" colspan=\"1\" aria-label=\"
                                                    Email
                                                    : activate to sort column ascending\" style=\"width: 181px;\">
    Punteggio Massimo
</th>
                                                <th class=\"sorting-disabled\" tabindex=\"0\" aria-controls=\"sample_2\" rowspan=\"1\" colspan=\"1\" aria-label=\"
                                                    Email
                                                    : activate to sort column ascending\" style=\"width: 181px;\">
                                                    % Inserito
</th>
                                                <th class=\"sorting-disabled\" tabindex=\"0\" aria-controls=\"sample_2\" rowspan=\"1\" colspan=\"1\" aria-label=\"
                                                    Email
                                                    : activate to sort column ascending\" style=\"width: 181px;\">
                                                    % Superato
</th>

                                            </tr>
                                        </thead>
                                        <tbody>
";


// if($mostra==true) {
    $toCheck = null;
    $array = Array();
    try {
        $array = $testModel->getAllTestByCorso($idCorso);
        $testsOfSessione = $testModel->getAllTestBySessione($idSessione);
    } catch (ApplicationException $ex) {
        echo "<h1>ERRORE NELLA LETTURA DEI TESTS!</h1>" . $ex;
    }
    if ($array == null) {

    } else {
        $sessioniByCorso = $modelSessione->getAllSessioniByCorso($idCorso);
        foreach ($array as $c) {
            if ($c->getPunteggioMax() == $maxFromSelect) {
                if ($sessioniByCorso != null) {
                    $scelti = $c->getPercentualeSceltoVal() + $c->getPercentualeSceltoEse();
                    $percSce = round(($scelti / count($sessioniByCorso) * 100), 2);
                } else
                    $percSce = 0;

                $succ = $c->getPercentualeSuccessoEse() + $c->getPercentualeSuccessoVal();
                $n = $c->getNumeroSceltaValutativa()+ $c->getNumeroSceltaEsercitativa();
                if ($n > 0)
                    $percSuc = round(($succ / $n * 100), 2);
                else
                    $percSuc = 0;
                printf("<tr class=\"gradeX odd\" role=\"row\">");
                foreach ($testsOfSessione as $t) {
                    if ($c->getId() == $t->getId())
                        $toCheck = "Checked";
                }
                printf("<td><input name=\"tests[]\" type=\"checkbox\" %s class=\"checkboxes\" value='%d'></td>", $toCheck, $c->getId());
                $toCheck = "";
                printf("<td class=\"sorting_1\">Test %s</td>", $c->getId());
                printf("<td>%s</td>", $c->getDescrizione());
                printf("<td>%d</td>", $c->getNumeroMultiple());
                printf("<td>%d</td>", $c->getNumeroAperte());
                printf("<td>%d</td>", $c->getPunteggioMax());
                printf("<td>%d%%</td>", $percSce);
                printf("<td>%d%%</td>", $percSuc);
                printf("</tr>");
            }
        }
    }
// }

    echo "</tbody> </div><div";
    echo "id=nomeCorso";
    echo "value='" . $idCorso . "'";
    echo "></div></table></div>";
}