<?php
/**
 * Created by PhpStorm.
 * User: fede_dr
 * Date: 23/11/15
 * Time: 21:59
 */

//TODO qui la logica iniziale, caricamento dei controller ecc
include_once CONTROL_DIR . "CdlController.php";
$controller = new CdlController();

$cdl = null;
$corsi = Array();
$url = $_URL[2];

if(!is_numeric($url)) {
    echo "<script type='text/javascript'>alert('errore nella url!!!');</script>";
}

try {
    $cdl = $controller->readCdl($url);
} catch (ApplicationException $ex) {
    echo "<h1>INSERIRE MATRICOLA CDL NEL PATH!</h1>".$ex;
}
try {
    $corsi = $controller->getCorsiCdl($cdl->getMatricola());
} catch (ApplicationException $ex) {
    echo "<h1>GETCORSICDL FALLITO!</h1>".$ex;
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
    <title>CdL <?php echo $cdl->getNome(); ?></title>
    <?php include VIEW_DIR . "design/header.php"; ?>
    <link rel="stylesheet" type="text/css" href="/assets/global/plugins/select2/select2.css">
    <link rel="stylesheet" type="text/css" href="/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css">
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
                CdL in <?php echo $cdl->getNome(); ?>
            </h3>

            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="usr/docente">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="/docente/cdls">CdL</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="/docente/cdl/<?php echo $cdl->getMatricola(); ?>"><?php echo $cdl->getNome(); ?></a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->

            <form method="post" action="">

                <div class="portlet box blue-madison">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-university"></i>Corsi CdL <?php echo $cdl->getNome(); ?>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse" data-original-title="" title="">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="tabella_2_wrapper" class="dataTables_wrapper no-footer">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer"
                                   id="tabella_2" role="grid" aria-describedby="tabella_2_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="sample_2" rowspan="1"
                                        colspan="1"
                                        aria-label="Status: activate to sort column ascending">
                                        Nome
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="sample_2" rowspan="1"
                                        colspan="1"
                                        aria-label="Email: activate to sort column ascending">
                                        Matricola
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="sample_2" rowspan="1"
                                        colspan="1"
                                        aria-label="Status: activate to sort column ascending">
                                        Tipologia
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($corsi as $c) {
                                    printf("<tr class=\"gradeX odd\" role=\"row\">");
                                    printf("<td class=\"sorting_1\"><a href=\"/docente/corso/%s\">%s</a></td>", $c->getId(), $c->getNome());
                                    printf("<td class=\"sorting_1\"><span class=\"badge badge-success\">%s</span></td>", $c->getMatricola());
                                    printf("<td class=\"sorting_1\"><span class=\"label label-sm label-success\">%s</span></td>", $c->getTipologia());
                                    printf("</tr>");
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
        TableManaged2.init("tabella_2", "tabella_2_wrapper");
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
