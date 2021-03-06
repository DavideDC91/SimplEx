<?php
/**
 * La view che consente al docente di visualizzare i dettagli di una sessione in corso
 * @author Antonio Luca D'Avanzo
 * @version 1
 * @since 18/11/15 09:58
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

$flag=null;
$url6="nada";
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

$numProfs=0;

$doc = $_SESSION['user'];
$docentiOe=$modelUtente->getAllDocentiByCorso($identificativoCorso);
foreach($docentiOe as $d) {
    if($doc==$d){
        $numProfs++;
    }
}
if($numProfs==0){
    header("Location: "."/docente/corso/".$corso->getId());
}
$corso = $modelCorso->readCorso($identificativoCorso);
$nomecorso= $corso->getNome();

if(isset($_URL[6])) {
    $url6=$_URL[6];
    if($_URL[6]=="nochange") {
        $flag=0;
    }
}

try {
    $sessioneByUrl = $modelSessione->readSessione($idSessione);
    $dataFrom = $sessioneByUrl->getDataInizio();
    $dataTo = $sessioneByUrl->getDataFine();
    $tipoSessione = $sessioneByUrl->getTipologia();
    $soglia = $sessioneByUrl->getSogliaAmmissione();

} catch (ApplicationException $ex) {
    echo "<h1>errore! ApplicationException->errore manca id sessione nel path!</h1>";
    echo "<h4>" . $ex . "</h4>";
}
$sessioneByUrl = $modelSessione->readSessione($idSessione);
$dataTo = $sessioneByUrl->getDataFine();
?>
<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title><?php echo $corso->getNome(); ?></title>
    <?php include VIEW_DIR . "design/header.php"; ?>
    <link rel="stylesheet" type="text/css"
          href="/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-toastr/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/global/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.css">

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md page-header-fixed page-quick-sidebar-over-content">
<?php include VIEW_DIR . "design/headMenu.php"; ?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <?php include VIEW_DIR . "design/sideBar.php"; ?>
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">
                <div id="demo">Sessione in Corso</div>
                </h3>

                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="/docente">Home</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="<?php echo "/docente/cdl/".$corso->getCdlMatricola(); ?>"> <?php echo $modelCdl->readCdl($corso->getCdlMatricola())->getNome(); ?> </a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <?php
                            $vaiANomeCorso="/docente/corso/".$identificativoCorso;
                            printf("<a href=\"%s\">%s</a><i class=\"fa fa-angle-right\"></i>", $vaiANomeCorso ,$nomecorso);
                            ?>
                        </li>
                        <li>
                            <?php echo "Sessione ".$idSessione ?>
                        </li>

                    </ul>
                </div>

            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->

            <!-- TABELLA 1 -->
            <?php
            if($flag==0 && $url6=="nochange") {
                printf("<div class='alert alert-danger'>
                    <button class=\"close\" data-close=\"alert\"></button>
                      Uno o più Studenti stanno svolgendo l'esame. Impossibile modificare la sessione! </div>");
                $flag=1;
            }
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-madison">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-globe"></i>Test
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse" data-original-title="" title="">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                                <div class="table-scrollable">
                                    <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="
                                         Username
                                : activate to sort column ascending" style="width: 119px;">
                                                Nome
                                            </th><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="
                                         Email
                                " style="width: 210px;">
                                                Descrizione
                                            </th><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="
                                         Points
                                " style="width: 73px;">
                                                N° multiple
                                            </th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="
                                         Status
                                " style="width: 119px;">
                                                N° aperte
                                            </th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="
                                         Status
                                " style="width: 119px;">
                                                Punteggio massimo
                                            </th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="
                                         Status
                                " style="width: 119px;">
                                                Inserito
                                            </th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="
                                         Status
                                " style="width: 119px;">
                                                Superato
                                            </th>
                                         
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $array = Array();
                                        $array = $testModel->getAllTestBySessione($idSessione);
                                        $sessioni = $modelSessione->getAllSessioniByCorso($identificativoCorso);
                                        $numSess = count($sessioni);
                                        if ($array == null) {
                                        }
                                        else {
                                            foreach ($array as $c) {
                                                printf("<tr class=\"gradeX odd\" role=\"row\">");
                                                printf("<td class=\"sorting_1\">Test %s</td>", $c->getId());
                                                printf("<td>%s</td>", base64_decode($c->getDescrizione()));
                                                printf("<td>%d</td>", $c->getNumeroMultiple());
                                                printf("<td>%d</td>", $c->getNumeroAperte());
                                                printf("<td>%d</td>", $c->getPunteggioMax());
                                                $percSce = ($numSess != 0)? round(($c->getPercentualeSceltoEse() + $c->getPercentualeSceltoVal())/$numSess * 100):0;
                                                printf("<td>%d%%</td>", $percSce);
                                                $numSucc = $c->getNumeroSceltaValutativa() + $c->getNumeroSceltaEsercitativa();
                                                $percSucc = ($numSucc!=0)? round(($c->getPercentualeSuccessoEse() + $c->getPercentualeSuccessoVal())/$numSucc * 100):0;
                                                printf("<td>%d%%</td>", $percSucc);
                                                printf("</tr>");
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                    
                </div>
    </div>


            <!-- TABELLA 2 -->
            <form method="post" action="/docente/corso/<?php echo $identificativoCorso; ?>/sessione/<?php echo $idSessione; ?>/indexsessioneincorso" name="myForm">

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-madison">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-globe"></i>Studenti
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse" data-original-title="" title="">
                                </a>
                            </div>
                        </div>
                            <div class="portlet-body " >
                              <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                        <div class="row">
                                <div class="col-md-12">
                                    <a href="/docente/corso/<?php echo $identificativoCorso; ?>/sessione/<?php echo $idSessione; ?>/sessioneincorso/aggiungistudente" class="btn sm green-jungle"><i class="fa fa-plus"></i><span class="md-click-circle md-click-animate" style="height: 94px; width: 94px; top: -23px; left: 2px;"></span>
                                        Aggiungi Studente</a>

                                        <a title="Aggiungi alla lista seguente gli Studenti che hanno appena cominciato il test!" name="aggiorna" href="<?php
                                        $vaiASesInCorso="/docente/corso/".$identificativoCorso."/sessione"."/".$idSessione."/"."sessioneincorso/show";
                                        printf("%s",$vaiASesInCorso);  ?>"
                                           class="btn sm green-jungle"><i class="fa fa-refresh" ></i><span class="md-click-circle md-click-animate" style="height: 94px; width: 94px; top: -23px; left: 2px;"></span>
                                            Aggiorna
                                        </a>
                                </div>
                        </div>
                                <div class="table-scrollable">
                                    <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="
                                         Username
                                : activate to sort column ascending" style="width: 119px;">
                                                Nome
                                            </th><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="
                                         Email
                                " style="width: 210px;">
                                                Cognome
                                            </th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="
                                         Email
                                " style="width: 100px;">
                                                Matricola
                                            </th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="
                                         Email
                                " style="width: 15%;">
                                                Azioni
                                            </th>
                                        </tr>
                                        
                                        </thead>
                                        <tbody>
                                        <?php
                                        $esaminandiSessione = Array();
                                        $toDisable="";
                                        $esaminandiSessione= $modelUtente->getEsaminandiSessione($idSessione);
                                        if ($esaminandiSessione == null) {
                                        }
                                        else {
                                            foreach ($esaminandiSessione as $c) {
                                                $ela=$modelElaborato->readElaborato($c->getMatricola(),$idSessione);
                                                printf("<tr class=\"gradeX odd\" role=\"row\">");
                                                printf("<td class=\"sorting_1\">%s</td>", $c->getNome());
                                                printf("<td>%s</td>", $c->getCognome());
                                                printf("<td>%s</td>", $c->getMatricola());
                                                if($ela->getStato()=="Corretto" && $ela->getEsitoParziale()==0 && $ela->getEsitoFinale()==0) {
                                                    $toDisable="Disabled";
                                                }
                                                printf("<td><button type='submit' %s name='annullaEsame' data-toggle=\"confirmation\"
                                        data-singleton=\"true\" data-popout=\"true\" title=\"Sicuro?\" value='%s' href=\"javascript:;\" class=\"btn btn-sm red-intense\">Annulla Esame</button></td>", $toDisable, $c->getMatricola());
                                                printf("</tr>");
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>



            <div class="row">

                    <div class="col-md-12">
                        <div class="col-md-2">
                            <label class="control-label"><h4>Termine Sessione:</h4></label>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group date form_datetime">
                                <input name="datato" id="termine" type="text" value='<?php printf("%s", $dataTo) ?>' readonly  size="16" class="form-control"/>
                                        <span class="input-group-btn">
                                            <button class="btn default date-set" type="button"><i
                                                    class="fa fa-calendar"></i></button>
                                        </span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" href="javascript:;" class="btn btn-md blue-madison"><span class="md-click-circle md-click-animate" style="height: 94px; width: 94px; top: -23px; left: 2px;"></span>
                                Modifica Termine
                                <i class="fa fa-edit"></i></button>
                        </div>
                        <div class="col-md-2" >
                        </div>
                        <div class="col-md-1" >
                         <button type="submit"  id="bottoneT" name="termina" value="<?php printf("%s", $dataTo) ?>" class="btn sm red-intense" data-toggle="confirmation"
                                data-singleton="true" data-popout="true" title="Sicuro?"><span class="md-click-circle md-click-animate" style="height: 94px; width: 94px; top: -23px; left: 2px;"></span>
                             TERMINA ORA
                         </button>
                            </div>
                    </div>
                </div>



            </form>


            <!-- END PAGE CONTENT-->


            

    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php include VIEW_DIR . "design/footer.php"; ?>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<?php include VIEW_DIR . "design/js.php"; ?>

<!--Script specifici per la pagina -->
<script src="/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
<script src="/assets/admin/pages/scripts/ui-toastr.js"></script>
<script src="/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js" type="text/javascript"></script>
<script src="/assets/admin/pages/scripts/ui-confirmations.js"></script>
<script type="text/javascript" src="/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <script src="/assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>

        <script>
    jQuery(document).ready(function () {
        Metronic.init();
        Layout.init();
        UIConfirmations.init();
        checkNotifiche();


    });
</script>
        <script>
            $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii:ss'});
        </script>
        <script src="/assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>

        <script>
            var count=0;
            function loadDoc() {
                var datTo = document.getElementById('bottoneT').value;
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var boT = new Date(datTo.substr(0, 4), datTo.substr(5, 2) - 1, datTo.substr(8, 2), datTo.substr(11, 2), datTo.substr(14, 2), datTo.substr(17, 2) );
                        var timeFromServer = new Date(xhttp.responseText.substr(0, 4), xhttp.responseText.substr(5, 2) - 1, xhttp.responseText.substr(8, 2), xhttp.responseText.substr(11, 2), xhttp.responseText.substr(14, 2), xhttp.responseText.substr(17, 2));
                        if(boT>=timeFromServer)
                            document.getElementById("demo").innerHTML = "Sessione in Corso" ;
                        else {
                            if(count==0) {
                                document.getElementById("demo").innerHTML = "Sessione Terminata";
                               bootbox.dialog({
                                    message: "Vai alla visualizzazione degli esiti.",
                                    title: "La sessione è terminata.",
                                    closeButton: false,
                                    buttons: {
                                        conferma: {
                                            label: "Ok",
                                            className: "green",
                                            callback: function () {
                                                var var1='/docente/corso/';
                                                var var2=<?php echo "$identificativoCorso" ?>;
                                                var var3='/sessione/';
                                                var var4=<?php echo "$idSessione" ?>;
                                                var var5='/esiti/autoendsuccess';
                                                var res1 = var1.concat(var2);
                                                var res2 = res1.concat(var3);
                                                var res3 = res2.concat(var4);
                                                var res4 = res3.concat(var5);
                                                location.href = res4;
                                            }
                                        }
                                    }
                                });
                                count++;
                            }
                        }
                    }
                };
                xhttp.open("GET", "/docente/corso/something/gestoredata", true);
                xhttp.send();
            }
            setInterval(loadDoc, 3000);
        </script>

        <script>
            //controlla se c'è qualche notifica da mostrare
            function checkNotifiche() {
                var href = window.location.href;
                var last = href.substr(href.lastIndexOf('/') + 1);
                if (last == 'successinserimento') {
                    toastr.success('Inserimento avvenuto correttamente!', 'Inserimento');
                } else if (last == 'successmodifica') {
                    toastr.success('Modifica avvenuta correttamente!', 'Modifica');
                } else if (last == 'successelimina') {
                    toastr.success('Eliminazione avvenuta correttamente!', 'Eliminazione');
                }
                else if (last == 'error') {
                    toastr.success('Problema nella creazione.', 'Eliminazione');
                }
            }
        </script>

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
