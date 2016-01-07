<?php
/**
 * La view consente allo studente di eseguire un test.
 * 
 * @author Fabiano Pecorelli
 * @version 1.0
 * @since 22/11/15
 */
//TODO qui la logica iniziale, caricamento dei controller ecc
include_once MODEL_DIR . "TestModel.php";
include_once MODEL_DIR . "SessioneModel.php";
include_once MODEL_DIR . "DomandaModel.php";
include_once MODEL_DIR . "RispostaApertaModel.php";
include_once MODEL_DIR . "RispostaMultiplaModel.php";
include_once MODEL_DIR . "AlternativaModel.php";
include_once MODEL_DIR . "ElaboratoModel.php";
$domandaModel = new DomandaModel();
$elaboratoModel = new ElaboratoModel();
$testModel = new TestModel();
$sessioneModel = new SessioneModel();
$alternativaModel = new AlternativaModel();
$rmCon = new RispostaMultiplaModel();
$corsoId = $_URL[2];
$sessId = $_URL[5];
$flag = 0;
if (!is_numeric($corsoId)) {
    echo "<script type='text/javascript'>alert('errore url!!(idcdl)');</script>";
}
if (!is_numeric($sessId)) {
    echo "<script type='text/javascript'>alert('errore url!!(idcdl)');</script>";
}
$sessione = $sessioneModel->readSessione($sessId);
$studente = $_SESSION['user'];
$matricola = $studente->getMatricola();
try{
    $elaborato = $elaboratoModel->readElaborato($matricola,$sessId);
}
catch(ApplicationException $ex){
    header("Location: "."/studente/corso/"."$corsoId"."/");
}

$maschera = $sessioneModel->readMascheraSessione($sessId);
if (($maschera != "") && !StringUtils::compareIP(IP,$maschera))
        $flag = 1;
if (strcmp($elaborato->getStato(),"Non corretto"))
        $flag = 1;
if ($flag != 0)
    header("Location: "."/studente/corso/"."$corsoId");

$nome = $studente->getNome();
$cognome = $studente->getCognome();

$testId = $elaborato->getTestId();
$multiple = $domandaModel->getAllDomandeMultipleByTest($testId);
$aperte = $domandaModel->getAllDomandeAperteByTest($testId);


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
    <meta charset="utf-8" />
    <title>Metronic | Page Layouts - Blank Page</title>
    <link rel="stylesheet" type="text/css" href="/assets/global/css/mycounter.css" />
    <?php include VIEW_DIR . "design/header.php"; ?>
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
                    Esegui Test
                </h3>
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="/studente">Home</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="/studente/corso/<?php echo $corsoId; ?>">Nome Corso</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            Esegui Test
                        </li>
                    </ul>
                </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            
                <div class="portlet box blue-madison">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-text-o"></i>Test
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse" data-original-title="" title="">
                            </a>
                        </div>
                        <div class="actions">
                            <div id="countdown"></div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input">
                                            <input type="text" class="form-control" value="<?php echo $nome; ?>" disabled="">
                                                <label for="form_control_1">Nome</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input">
                                            <input type="text" class="form-control" value="<?php echo $cognome; ?>" disabled="">
                                                <label for="form_control_1">Cognome</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input">
                                            <input type="text" class="form-control" value="<?php echo $matricola; ?>" disabled="">
                                                <label for="form_control_1">Matricola</label>
                                                    <span class="help-block">Inserire la matricola</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $selectedAlt = null;
                            function getRispostaMultiplaAlternativa($elaboratoSessioneId, $elaboratoStudenteMatricola, $domandaMultiplaId){
                                $rmCon = new RispostaMultiplaModel();
                                $risp = $rmCon->readRispostaMultipla($elaboratoSessioneId, $elaboratoStudenteMatricola, $domandaMultiplaId);
                                return $risp->getAlternativaId();
                            }
                            function getRispostaApertaValue($elaboratoSessioneId, $elaboratoStudenteMatricola, $domandaApertaId){
                                $raCon = new RispostaApertaModel();
                                $risp = $raCon->readRispostaAperta($elaboratoSessioneId, $elaboratoStudenteMatricola, $domandaApertaId);
                                return base64_decode($risp->getTesto());
                            }
                                $i = 1;
                                foreach ($multiple as $m) {
                                    $j = 1;
                                    $testo = base64_decode($m->getTesto());
                                    $multId = $m->getId();
                                    try{
                                        $selectedAlt = getRispostaMultiplaAlternativa($sessId, $matricola, $multId);
                                    }
                                    catch (ApplicationException $ex){
                                        $selectedAlt = null;
                                    }
                                    echo "<h3>".$testo."</h3>";
                                    echo '<div class="form-group form-md-checkboxes">';
                                    echo '<div class="md-checkbox-list">';
                                    $alternative = $alternativaModel->getAllAlternativaByDomanda($multId);
                                    foreach ($alternative as $r){
                                        $altId = $r->getId();
                                        echo    '<div class="md-checkbox">
                                                    <input type="checkbox" id="alt-'.$altId.'" name="mul-'.$multId.'" ';
                                        if ($selectedAlt == $altId) echo 'checked';
                                        echo        ' onclick="javascript: updateMultipla(this.name,this.id);" class="md-check">
                                                    <label for="alt-'.$altId.'">
                                                    <span class="inc"></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    '.base64_decode($r->getTesto()).'</label>
                                                </div>';
                                        $j++;
                                    }
                                    $i++;
                                    echo '</div>';
                                    echo '</div>';
                                }

                                foreach ($aperte as $a) {
                                    $testo = base64_decode($a->getTesto());
                                    $apId = $a->getId();
                                    $txt = null;
                                    try{
                                        $txt = getRispostaApertaValue($sessId, $matricola, $apId);
                                    }
                                    catch (ApplicationException $ex){
                                        $txt = null;
                                    }
                                    echo '<h3>'.$testo.'</h3>';
                                    echo    '<div class="form-group">
                                                <textarea class="form-control" id="ap-'.$apId.'" rows="3" placeholder="Inserisci risposta" style="resize:none">'.$txt.'</textarea>
                                            </div>';
                                    $i++;
                                }
                            ?>                        
                        </div>
                    </div>
                </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <?php
                                            printf("<button href=\"/studente/corso/%d\" onclick=\"javascript: consegna();\"  name=\"consegna\" class=\"btn green\" data-toggle=\"confirmation\" data-singleton=\"true\" data-popout=\"true\" title=\"Sei sicuro di voler consegnare?\">Consegna</button>",$corsoId);
                                            printf("<button href=\"/studente/corso/%d\" onclick=\"javascript: abbandona();\" name=\"abbandona\" class=\"btn red-intense\" data-toggle=\"confirmation\" data-singleton=\"true\" data-popout=\"true\" title=\"Vuoi davvero ritirarti? Ti verrà assegnato esito nullo.\">Abbandona</button>",$corsoId);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>

<!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php include VIEW_DIR . "design/footer.php"; ?>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<?php include VIEW_DIR . "design/js.php"; ?>

<!--Script specifici per la pagina -->
<script src="/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>

<script src="/assets/admin/pages/scripts/ui-confirmations.js"></script>
<script src="/assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js" type="text/javascript"></script>

<script src="/assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script src="/assets/admin/pages/scripts/ui-alert-dialog-api.js"></script>
<script src="/assets/admin/pages/scripts/ui-blockui.js"></script>

<script type="text/javascript">
    
    var cId = <?= $corsoId ?>;
    var sId = <?= $sessId ?>;
    var mat = "<?= $matricola; ?>";
    var intId = null;
    var intId2 = null;
    var intId3 = null;
    var intId4 = null;
    var intCheck = null;
    var intWait = null;
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        UIConfirmations.init();
        UIAlertDialogApi.init();
        checkConnection();
        intCheck = setInterval(checkConnection,1000);
        
        //Metronic.startPageLoading({animate: true});
        //window.setTimeout(function() {
        //    Metronic.stopPageLoading();
        //}, 2000);
        //countdown
        /*
        $.ajax({
            url: "/studente/gestoreCountdown",
            method: "GET",
            data: "sessId="+sId
        }).done(function(data) {
            StartCounter(data);
           });*/
        
        $.get("/studente/creaRisposte?sessId="+sId);
        $.get("/studente/gestoreCountdown?sessId="+sId,function(data){StartCounter(data);});
        intId2 = setInterval(function(){$.get("/studente/gestoreCountdown?sessId="+sId,function(data){StartCounter(data);});},5000);
        //fine countdown
        //controller abilitazione
        $.get("/studente/controllerAbilitazione?mat="+mat+"&sessId="+sId,function(data){valutaAbilitazione(data);});
        intId4 = setInterval(function(){$.get("/studente/controllerAbilitazione?mat="+mat+"&sessId="+sId,function(data){valutaAbilitazione(data);});},5000);
        //fine controller
        //aperte
        $("textarea").focus(function() {
            var apId = $(this).attr('id');
            $.get("/studente/controllerAbilitazione?mat="+mat+"&sessId="+sId,function(data){
                var check = valutaAbilitazione(data);
                $.get("/studente/gestoreCountdown?sessId="+sId,function(data){
                var date= data.split("|");
                var end = date[0];
                var start = date[1];
                var fine = new Date(end.substr(0, 4), end.substr(5, 2) - 1, end.substr(8, 2), end.substr(11, 2), end.substr(14, 2), end.substr(17, 2)).getTime();
                var inizio = new Date(start.substr(0, 4), start.substr(5, 2) - 1, start.substr(8, 2), start.substr(11, 2), start.substr(14, 2), start.substr(17, 2)).getTime();
                check = check & (inizio < fine);
                StartCounter(data);
                    if (check){
                        intId3 = setInterval(function(){
                            var testo = document.getElementById(apId).value;
                            var res = apId.split('-');
                            var id = res[1];
                            $.post("/studente/updateAperta?mat="+mat+"&sessId="+sId+"&domId="+id+"&testo="+testo);
                        },1000);
                    }
                });
            });
        });
        $("textarea").blur(function() {
            var apId = $(this).attr('id');
            $.get("/studente/controllerAbilitazione?mat="+mat+"&sessId="+sId,function(data){
               var check = valutaAbilitazione(data);
                $.get("/studente/gestoreCountdown?sessId="+sId,function(data){
                var date= data.split("|");
                var end = date[0];
                var start = date[1];
                var fine = new Date(end.substr(0, 4), end.substr(5, 2) - 1, end.substr(8, 2), end.substr(11, 2), end.substr(14, 2), end.substr(17, 2)).getTime();
                var inizio = new Date(start.substr(0, 4), start.substr(5, 2) - 1, start.substr(8, 2), start.substr(11, 2), start.substr(14, 2), start.substr(17, 2)).getTime();
                check = check & (inizio < fine);
                StartCounter(data);
                    if (check){
                        var testo = document.getElementById(apId).value;
                        var res = apId.split('-');
                        var id = res[1];
                        $.post("/studente/updateAperta?mat="+mat+"&sessId="+sId+"&domId="+id+"&testo="+testo);
                        clearInterval(intId3);
                    }
                });
            });
        });/*
        $("textarea").each(function(){
            $.get("/getApertaValue?mat="+mat+"&sessId="+sId+"&domId="+id+"&testo="+testo);
        });*/
        //fine aperte
        //multiple
        $("input.md-check").click(function() {
            var multId = $(this).attr('name');
            var res = multId.split('-');
            var rId = res[1];
            var altId = $(this).attr('id');
            res = altId.split('-');
            var aId = res[1];
            if ($("#"+$(this).attr('id')).is(":not(:checked)")){
                aId = null;
                $("#"+$(this).attr('id')).prop( "checked", false);
            }
            else{
                $(".md-check[name="+$(this).attr('name')+"]").prop( "checked", false);
                $("#"+$(this).attr('id')).prop( "checked", true);
            }
            $.get("/studente/controllerAbilitazione?mat="+mat+"&sessId="+sId,function(data){
                check = valutaAbilitazione(data);
                $.get("/studente/gestoreCountdown?sessId="+sId,function(data){
                var date= data.split("|");
                var end = date[0];
                var start = date[1];
                var fine = new Date(end.substr(0, 4), end.substr(5, 2) - 1, end.substr(8, 2), end.substr(11, 2), end.substr(14, 2), end.substr(17, 2)).getTime();
                var inizio = new Date(start.substr(0, 4), start.substr(5, 2) - 1, start.substr(8, 2), start.substr(11, 2), start.substr(14, 2), start.substr(17, 2)).getTime();
                check = check & (inizio < fine);
                StartCounter(data);
                    if (check){
                        $.post("/studente/updateMultipla?mat="+mat+"&sessId="+sId+"&domId="+rId+"&altId="+aId);
                    }
                });
            });
        });
        //fine multiple
        //QuickSidebar.init(); // init quick sidebar
        //Demo.init(); // init demo features
    });
    
    
   function checkConnection() {
        if (navigator.onLine) {
        } else {
            Metronic.blockUI({
                esegui: true
            });
            Metronic.startPageLoading({animate: true});
            clearInterval(intCheck);
            intWait = setInterval(waitConnection,1000);
        }
    }
    
    function waitConnection() {
        if (navigator.onLine) {
            Metronic.unblockUI();
            Metronic.stopPageLoading();
            clearInterval(intWait);
            intCheck = setInterval(checkConnection,1000);
        } else {
        }
    }

//Metronic.startPageLoading({animate: true});
        //window.setTimeout(function() {
        //    Metronic.stopPageLoading();
        //}, 2000);
        
   var StartCounter = function(string){
       
        var date= string.split("|");
        var end = date[0];
        var start = date[1];
        
        //var target_date = new Date(end).getTime();
        //var current_date = new Date(start).getTime();
        
        var target_date = new Date(end.substr(0, 4), end.substr(5, 2) - 1, end.substr(8, 2), end.substr(11, 2), end.substr(14, 2), end.substr(17, 2)).getTime();
        var current_date = new Date(start.substr(0, 4), start.substr(5, 2) - 1, start.substr(8, 2), start.substr(11, 2), start.substr(14, 2), start.substr(17, 2)).getTime();
        
        showTime(current_date,target_date);
        clearInterval(intId);
        intId = setInterval(function(){
            current_date = current_date + 1000;
            showTime(current_date,target_date);}, 1000);
    }
    
    var showTime = function (current_date,target_date) {
        var countdown = document.getElementById("countdown");
        var seconds_left = (target_date - current_date) / 1000;
        var remaining_time = seconds_left;
        var days = parseInt(seconds_left / 86400);
        seconds_left = seconds_left % 86400;

        var hours = parseInt(seconds_left / 3600);
        seconds_left = seconds_left % 3600;
        var minutes = parseInt(seconds_left / 60);
        var seconds = parseInt(seconds_left % 60);
        if (remaining_time > 0)
            if (remaining_time >= 600)
                countdown.innerHTML = '<span  style="color: #cf6"><span class="days">' + days +  ' <b>Giorni</b></span> <span class="hours">' + hours + ' <b>Ore</b></span> <span class="minutes">'
        + minutes + ' <b>Minuti</b></span> <span class="seconds">' + seconds + ' <b>Secondi</b></span></span>';
               // countdown.innerHTML = '<span class="time" style="color: #cf6"> '+ hours + ':' + minutes +':' + seconds + ' </span>';  
            else
                countdown.innerHTML = '<span  style="color: #c30"><span class="days">' + days +  ' <b>Giorni</b></span> <span class="hours">' + hours + ' <b>Ore</b></span> <span class="minutes">'
        + minutes + ' <b>Minuti</b></span> <span class="seconds">' + seconds + ' <b>Secondi</b></span></span>';
               // countdown.innerHTML = '<span class="time" style="color: #c30"> '+ hours + ':' + minutes +':' + seconds + ' </span>'; 
        else{ 
            $.get("/studente/gestoreCountdown?sessId="+sId,function(data){
                var date= data.split("|");
                var end = date[0];
                var start = date[1];
                
                var fine = new Date(end.substr(0, 4), end.substr(5, 2) - 1, end.substr(8, 2), end.substr(11, 2), end.substr(14, 2), end.substr(17, 2)).getTime();
                var inizio = new Date(start.substr(0, 4), start.substr(5, 2) - 1, start.substr(8, 2), start.substr(11, 2), start.substr(14, 2), start.substr(17, 2)).getTime();
                
                if (inizio >= fine){
                    countdown.innerHTML = '<span class="time" style="color: #c30"> Tempo Scaduto </span>';
                    timeout_scaduto();
                }
                else{
                    var target_date = fine;
                    var current_date = inizio;
                    showTime(current_date,target_date);
                    clearInterval(intId2);
                    intId2 = setInterval(function(){$.get("/studente/gestoreCountdown?sessId="+sId,function(data){StartCounter(data);});},5000);
                }
                
            });
        }
    }
    
    var valutaAbilitazione = function(string){
        if (string == "Corretto"){
            bootbox.dialog({
                message: "Impossibile continuare l'esecuzione. Il tuo test è stato annullato.",
                title: "Test annullato!",
                closeButton: false,
                buttons: {
                  conferma: {
                    label: "Ok",
                    className: "red",
                    callback: function() {
                      location.href = "/studente/corso/<?php echo $corsoId; ?>";
                    }
                  }
                }
            });
            stopInterval();
            return false;
        }
        else if (string == "Parzialmente corretto"){
            bootbox.dialog({
                message: "Impossibile continuare l'esecuzione. Hai già sostenuto questo test in precedenza.",
                title: "Test già eseguito!",
                closeButton: false,
                buttons: {
                  conferma: {
                    label: "Ok",
                    className: "red",
                    callback: function() {
                      location.href = "/studente/corso/<?php echo $corsoId; ?>";
                    }
                  }
                }
            });
            stopInterval();
            return false;
        }
        else return true;
    }
    
    function consegna(){
        stopInterval();
        $.post("/studente/consegna?mat="+mat+"&sessId="+sId+"&corsoId="+cId);
    }
    
    function abbandona(){
        stopInterval();
        $.post("/studente/abbandona?mat="+mat+"&sessId="+sId+"&corsoId="+cId);
    }
                                            
    function timeout_scaduto(){
        bootbox.dialog({
                    message: "Vuoi consegnare o ritirarti?",
                    title: "Tempo scaduto!",
                    closeButton: false,
                    buttons: {
                      consegna: {
                        label: "Consegna",
                        className: "green",
                        href: "/studente/corso/<?php echo $corsoId; ?>",
                        callback: function() {
                            consegna();
                            bootbox.dialog({
                            message: "Consegna effettuata con successo",
                            closeButton: false,
                            buttons: {
                              conferma: {
                                label: "Ok",
                                className: "green",
                                callback: function() {
                                  location.href = "/studente/corso/<?php echo $corsoId; ?>";
                                }
                              }
                            }
                        });
                        }
                      },
                      abbandona: {
                        label: "Abbandona",
                        className: "red",
                        callback: function() {
                            abbandona();
                            bootbox.dialog({
                            message: "Test Annullato",
                            closeButton: false,
                            buttons: {
                              conferma: {
                                label: "Ok",
                                className: "red",
                                callback: function() {
                                  location.href = "/studente/corso/<?php echo $corsoId; ?>";
                                }
                              }
                            }
                        });
                        }
                      }
                    }
                });
                stopInterval();
            }
function stopInterval(){
    clearInterval(intId);
    clearInterval(intId2);
    clearInterval(intId3);
    clearInterval(intId4);
}
        
            /*
    var Consegna = function(){
               
        }
        
        
        var Abbandona = function(){
            if (r == true){
                confirm("lallalla");
                $.post("/abbandona?mat="+mat+"&sessId="+sId);
            }
        }*/
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
