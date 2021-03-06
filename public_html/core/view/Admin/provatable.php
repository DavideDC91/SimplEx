<?php
/**
 * Created by PhpStorm.
 * User: fede_dr
 * Date: 23/11/15
 * Time: 21:59
 */

//TODO qui la logica iniziale, caricamento dei controller ecc
include_once CONTROL_DIR . "Esempio.php";
$controller = new Esempio();
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
    <title>Table</title>
    <?php include VIEW_DIR . "design/header.php"; ?>
    <link rel="stylesheet" type="text/css" href="/assets/global/plugins/select2/select2.css">
    <link rel="stylesheet" type="text/css"
          href="/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css">
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
                Prova Table
            </h3>

            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="index">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="provatable">ProvaTable</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                </ul>
            </div>

            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->


            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-user"></i>Table
                    </div>
                    <div class="actions">
                        <a href="javascript:;" class="btn btn-default btn-sm">
                            <i class="fa fa-pencil"></i> Add </a>

                        <div class="btn-group">
                            <a class="btn btn-default btn-sm" href="javascript:;" data-toggle="dropdown">
                                <i class="fa fa-cogs"></i> Tools <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:;">
                                        <i class="fa fa-pencil"></i> Edit </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="fa fa-trash-o"></i> Delete </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="fa fa-ban"></i> Ban </a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="i"></i> Make admin </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="tabella_studenti_wrapper" class="dataTables_wrapper no-footer">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer"
                                   id="tabella_studenti" role="grid" aria-describedby="tabella_studenti_info">
                                <thead>
                                <tr role="row">
                                    <th class="table-checkbox sorting_disabled" rowspan="1" colspan="1" aria-label=""
                                        style="width: 24px;">
                                        <input type="checkbox" class="group-checkable" data-set="#tabella_studenti .checkboxes">
                                    </th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="sample_2" rowspan="1"
                                        colspan="1" aria-label="Username: activate to sort column ascending"
                                        aria-sort="ascending" style="width: 78px;">
                                        Username
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1"
                                        aria-label="Email: activate to sort column ascending" style="width: 137px;">
                                        Email
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1"
                                        aria-label="Status: activate to sort column ascending" style="width: 36px;">
                                        Status
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1"
                                        aria-label="Status: activate to sort column ascending" style="width: 36px;">
                                        Date
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="gradeX odd" role="row">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1">
                                    </td>
                                    <td class="sorting_1">
                                        coop
                                    </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com">
                                            good@gmail.com </a>
                                    </td>
                                    <td>
									<span class="label label-sm label-success">
									Approved </span>
                                    </td>
                                    <td>
									<span class="label label-sm label-warning">
									No </span>
                                    </td>
                                </tr>
                                <tr class="gradeX even" role="row">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1">
                                    </td>
                                    <td class="sorting_1">
                                        foopl
                                    </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com">
                                            good@gmail.com </a>
                                    </td>
                                    <td>
									<span class="label label-sm label-success">
									Approved </span>
                                    </td>
                                    <td>
									<span class="label label-sm label-warning">
									No </span>
                                    </td>
                                </tr>
                                <tr class="gradeX odd" role="row">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1">
                                    </td>
                                    <td class="sorting_1">
                                        looper
                                    </td>
                                    <td>
                                        <a href="mailto:looper90@gmail.com">
                                            looper90@gmail.com </a>
                                    </td>
                                    <td>
									<span class="label label-sm label-warning">
									Suspended </span>
                                    </td>
                                    <td>
									<span class="label label-sm label-warning">
									No </span>
                                    </td>
                                </tr>
                                <tr class="gradeX even" role="row">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1">
                                    </td>
                                    <td class="sorting_1">
                                        pppol
                                    </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com">
                                            good@gmail.com </a>
                                    </td>
                                    <td>
									<span class="label label-sm label-success">
									Approved </span>
                                    </td>
                                    <td>
									<span class="label label-sm label-warning">
									No </span>
                                    </td>
                                </tr>
                                <tr class="gradeX odd" role="row">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1">
                                    </td>
                                    <td class="sorting_1">
                                        restest
                                    </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com">
                                            test@gmail.com </a>
                                    </td>
                                    <td>
									<span class="label label-sm label-success">
									Approved </span>
                                    </td>
                                    <td>
									<span class="label label-sm label-warning">
									Not </span>
                                    </td>
                                </tr>
                                <tr class="gradeX odd" role="row">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1">
                                    </td>
                                    <td class="sorting_1">
                                        restest
                                    </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com">
                                            test@gmail.com </a>
                                    </td>
                                    <td>
									<span class="label label-sm label-success">
									Approved </span>
                                    </td>
                                    <td>
									<span class="label label-sm label-warning">
									No </span>
                                    </td>
                                </tr>
                                <tr class="gradeX odd" role="row">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1">
                                    </td>
                                    <td class="sorting_1">
                                        restest
                                    </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com">
                                            test@gmail.com </a>
                                    </td>
                                    <td>
									<span class="label label-sm label-success">
									Approved </span>
                                    </td>
                                    <td>
									<span class="label label-sm label-warning">
									No </span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>






            <div class="portlet box purple">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Table
                    </div>
                    <div class="actions">
                        <a href="javascript:;" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Add </a>
                        <a href="javascript:;" class="btn btn-default btn-sm">
                            <i class="fa fa-print"></i> Print </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="tabella_2_wrapper" class="dataTables_wrapper no-footer">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer"
                                   id="tabella_2" role="grid" aria-describedby="tabella_2_info">
                                <thead>
                                <tr role="row">
                                    <th class="table-checkbox sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 24px;">
                                        <input type="checkbox" class="group-checkable" data-set="#tabella_2 .checkboxes">
                                    </th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="sample_3" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column ascending" style="width: 78px;">
                                        Username
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="sample_3" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 137px;">
                                        Email
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="sample_3" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 71px;">
                                        Status
                                    </th>
                                </tr>
                                </thead>
                                <tbody>


                                <tr class="gradeX odd" role="row">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1">
                                    </td>
                                    <td class="sorting_1">
                                        coop
                                    </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com">
                                            good@gmail.com </a>
                                    </td>
                                    <td>
									<span class="label label-sm label-success">
									Approved </span>
                                    </td>
                                </tr>
                                <tr class="gradeX even" role="row">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1">
                                    </td>
                                    <td class="sorting_1">
                                        foopl
                                    </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com">
                                            good@gmail.com </a>
                                    </td>
                                    <td>
									<span class="label label-sm label-success">
									Approved </span>
                                    </td>
                                </tr>
                                <tr class="gradeX odd" role="row">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1">
                                    </td>
                                    <td class="sorting_1">
                                        looper
                                    </td>
                                    <td>
                                        <a href="mailto:looper90@gmail.com">
                                            looper90@gmail.com </a>
                                    </td>
                                    <td>
									<span class="label label-sm label-warning">
									Suspended </span>
                                    </td>
                                </tr>
                                <tr class="gradeX even" role="row">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1">
                                    </td>
                                    <td class="sorting_1">
                                        pppol
                                    </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com">
                                            good@gmail.com </a>
                                    </td>
                                    <td>
									<span class="label label-sm label-success">
									Approved </span>
                                    </td>
                                </tr>
                                <tr class="gradeX odd" role="row">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1">
                                    </td>
                                    <td class="sorting_1">
                                        restest
                                    </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com">
                                            test@gmail.com </a>
                                    </td>
                                    <td>
									<span class="label label-sm label-success">
									Approved </span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



            <div class="portlet box purple">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Table
                    </div>
                    <div class="actions">
                        <a href="javascript:;" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Add </a>
                        <a href="javascript:;" class="btn btn-default btn-sm">
                            <i class="fa fa-print"></i> Print </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="tabella_3_wrapper" class="dataTables_wrapper no-footer">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer"
                                   id="tabella_3" role="grid" aria-describedby="tabella_3_info">
                                <thead>
                                <tr role="row">
                                    <th class="table-checkbox sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 24px;">
                                        <input type="checkbox" class="group-checkable" data-set="#tabella_3 .checkboxes">
                                    </th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="sample_3" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column ascending" style="width: 78px;">
                                        Username
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="sample_3" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 137px;">
                                        Email
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="sample_3" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 71px;">
                                        Status
                                    </th>
                                </tr>
                                </thead>
                                <tbody>


                                <tr class="gradeX odd" role="row">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1">
                                    </td>
                                    <td class="sorting_1">
                                        coop
                                    </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com">
                                            good@gmail.com </a>
                                    </td>
                                    <td>
									<span class="label label-sm label-success">
									Approved </span>
                                    </td>
                                </tr>
                                <tr class="gradeX even" role="row">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1">
                                    </td>
                                    <td class="sorting_1">
                                        foopl
                                    </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com">
                                            good@gmail.com </a>
                                    </td>
                                    <td>
									<span class="label label-sm label-success">
									Approved </span>
                                    </td>
                                </tr>
                                <tr class="gradeX odd" role="row">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1">
                                    </td>
                                    <td class="sorting_1">
                                        looper
                                    </td>
                                    <td>
                                        <a href="mailto:looper90@gmail.com">
                                            looper90@gmail.com </a>
                                    </td>
                                    <td>
									<span class="label label-sm label-warning">
									Suspended </span>
                                    </td>
                                </tr>
                                <tr class="gradeX even" role="row">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1">
                                    </td>
                                    <td class="sorting_1">
                                        pppol
                                    </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com">
                                            good@gmail.com </a>
                                    </td>
                                    <td>
									<span class="label label-sm label-success">
									Approved </span>
                                    </td>
                                </tr>
                                <tr class="gradeX odd" role="row">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1">
                                    </td>
                                    <td class="sorting_1">
                                        restest
                                    </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com">
                                            test@gmail.com </a>
                                    </td>
                                    <td>
									<span class="label label-sm label-success">
									Approved </span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
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
        TableManaged.init("tabella_studenti","tabella_studenti_wrapper");
        TableManaged.init("tabella_2","tabella_2_wrapper");
        TableManaged.init("tabella_3","tabella_3_wrapper");
        //TableManaged.init(3);
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
