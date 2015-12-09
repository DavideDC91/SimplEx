<?php
/**
 * Created by PhpStorm.
 * User: fede_dr
 * Date: 23/11/15
 * Time: 21:58
 */

//TODO qui la logica iniziale, caricamento dei controller ecc
include_once CONTROL_DIR . "CdlController.php";
include_once CONTROL_DIR . "UtenteController.php";
include_once CONTROL_DIR . "SessioneController.php";

$controllerCdl = new CdlController();
$controllerUtenti = new UtenteController();
$sesController = new SessioneController();

$idSessione=$_URL[5];
$idCorso = $_URL[3];
$corso = $controllerCdl->readCorso($idCorso);
$nomecorso= $corso->getNome();

$docenteassociato = Array();
$checkbox = Array();
$corso = null;
$docenti = null;
$docente = null;
$url = null;

$url = $_URL[3];
if(!is_numeric($url)) {
    echo "<script type='text/javascript'>alert('errore nella url!!!');</script>";
}

try {
    $corso = $controllerCdl->readCorso($url);
}
catch (ApplicationException $ex) {
    echo "<h1>INSERIRE ID CORSO NEL PATH!</h1>".$ex;
}

if($someStudentsChange=isset($_POST['abilita'])) {
    if($someStudentsChange){
        $cbStudents= Array();
        $cbStudents = $_POST['students'];
        foreach($allStuAbi as $s) {
            $sesController->disabilitaStudenteDaSessione($idSessione, $s->getMatricola());
        }
        //creo l'abilitazione students-sessione
        foreach($cbStudents as $s) {
            $sesController->abilitaStudenteASessione($idSessione,$s);
        }
    }

    header("Location: ../sessioneincorso");

}

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
    <?php include VIEW_DIR . "design/"."header.php"; ?>
    <link rel="stylesheet" type="text/css" href="/assets/global/plugins/select2/select2.css">
    <link rel="stylesheet" type="text/css" href="/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md page-header-fixed page-quick-sidebar-over-content">
<?php include VIEW_DIR . "design/"."headMenu.php"; ?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <?php include VIEW_DIR ."design/". "sideBar.php"; ?>
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">
                Aggiungi Studenti
            </h3>

            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="index.html">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="<?php echo "/usr/docente/cdl/".$corso->getCdlMatricola(); ?>"> <?php echo $controllerCdl->readCdl($corso->getCdlMatricola())->getNome(); ?> </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <?php
                        $vaiANomeCorso="/usr/docente/corso/".$idCorso;
                        printf("<a href=\"%s\">%s</a><i class=\"fa fa-angle-right\"></i>", $vaiANomeCorso ,$nomecorso);
                        ?>
                    </li>
                    <li>
                        <?php
                            $sex = "Sessione ".$idSessione;
                            $vaiASex= "/usr/docente/corso/".$idCorso."/"."sessione"."/".$idSessione."/"."sessioneincorso";
                            printf("<a href=\"%s\">%s</a>", $vaiASex, $sex);
                        ?>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Aggiungi Studenti
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->

            <div class="row">
                <h3></h3>
            </div>

            <form method="post" action="">

                <div class="portlet box blue-madison">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-university"></i>Scegli uno Studente
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse" data-original-title="" title="">
                            </a>
                        </div>
                        <div class="actions">
                            <button type="submit" name="abilita" class="btn btn-default btn-sm">
                                <i class="fa fa-plus"></i> Abilita
                            </button>
                            <input type="hidden" id="elimina" name="elimina" value="elimina">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="tabella_4_wrapper" class="dataTables_wrapper no-footer">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer"
                                   id="tabella_4" role="grid" aria-describedby="tabella_4_info">
                                <thead>
                                <tr role="row">
                                    <th class="table-checkbox sorting_disabled" rowspan="1" colspan="1"
                                        aria-label=""
                                        style="width: 24px;">
                                        <input type="checkbox" class="group-checkable"
                                               data-set="#tabella_4 .checkboxes">
                                    </th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="sample_2" rowspan="1"
                                        colspan="1" aria-label="Username: activate to sort column ascending"
                                        aria-sort="ascending" style="width: 78px;">
                                        Nome
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="sample_2" rowspan="1"
                                        colspan="1"
                                        aria-label="Email: activate to sort column ascending" style="width: 137px;">
                                        Cognome
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="sample_2" rowspan="1"
                                        colspan="1"
                                        aria-label="Status: activate to sort column ascending" style="width: 36px;">
                                        Matricola
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $array = Array();
                                $toCheckS="";
                                $disabilita="";
                                $array = $sesController->getAllStudentiByCorso($idCorso);
                                $studentsOfSessione= $sesController->getAllStudentiBySessione($idSessione);
                                if ($array == null) {
                                    echo "l'array è null";
                                }
                                else {
                                    foreach ($array as $c) {
                                        printf("<tr class=\"gradeX odd\" role=\"row\">");
                                        foreach($studentsOfSessione as $t){
                                            if($c->getMatricola()==$t->getMatricola()) {
                                                $disabilita="disabled";
                                                $toCheckS = "Checked";
                                            }
                                        }
                                        printf("<td><input name=\"students[]\" type=\"checkbox\" %s %s class=\"checkboxes\" value='%s'></td>",$disabilita,$toCheckS, $c->getMatricola());
                                        $toCheckS="";
                                        $disabilita="";
                                        printf("<td class=\"sorting_1\">%s</td>", $c->getNome());
                                        printf("<td>%s</td>", $c->getCognome());
                                        printf("<td>%s</td>", $c->getMatricola());
                                        printf("</tr>");
                                    }
                                }
                                ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </form>
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
<!-- BEGIN PAGE LEVEL PLUGINS aggiunta da me-->
<script type="text/javascript" src="/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"
        src="/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS aggiunta da me-->

<script src="/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<!-- BEGIN aggiunta da me -->
<script src="/assets/admin/pages/scripts/table-managed.js"></script>
<!-- END aggiunta da me -->
<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        //QuickSidebar.init(); // init quick sidebar
        //Demo.init(); // init demo features
        TableManaged.init("tabella_4", "tabella_4_wrapper");
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>