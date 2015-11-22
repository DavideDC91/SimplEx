<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 18/11/15
 * Time: 09:58
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
    <title>Metronic | Page Layouts - Blank Page</title>
    <?php include VIEW_DIR . "header.php"; ?>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md page-header-fixed page-quick-sidebar-over-content">
<?php include VIEW_DIR . "headMenu.php"; ?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <?php include VIEW_DIR . "sideBar.php"; ?>
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">
                Crea Test
            </h3>
            <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="index.html">Home</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Nome Corso</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Nome Sessione</a>
                        </li>
                    </ul>
                </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <form>
                <div class="form-body">
                    <div clas="row">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group form-md-line-input has-success">
                                    <div class="input-icon">
                                        <input type="text" class="form-control">
                                            <label for="form_control_1">Nome</label>
                                                <span class="help-block">Inserire nome sessione</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-4">
                                    <label class="control-label">Avvio:</label>
                                    <div class="input-icon">
                                        <i class="fa fa-calendar"></i>
                                        <input class="form-control date-picker" size="16" type="text" value="12-02-2012" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                            <input type="text" class="form-control">
                                                <label for="form_control_1">Ora</label>
                                                    <span class="help-block">Avvio</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-4">
                                    <label class="control-label">Termine:</label>
                                    <div class="input-icon">
                                        <i class="fa fa-calendar"></i>
                                        <input class="form-control date-picker" size="16" type="text" value="12-02-2012" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                            <input type="text" class="form-control">
                                                <label for="form_control_1">Ora</label>
                                                    <span class="help-block">Termine</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box grey-cascade">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i>Test
                                    </div>
                                    <div class="tools">
                                        <input type="radio"/> Valutativo
                                        <input type="radio"/> Esercitativo
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
                                                        <th>
                                                            <input type="checkbox"/>
                                                        </th>
                                                        <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="
                                                     Username
                                            : activate to sort column ascending" style="width: 119px;">
                                                            Nome
                                                        </th><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="
                                                     Email
                                            " style="width: 210px;">
                                                            Data creazione
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
                                                    <tr class="gradeX odd" role="row">
                                                        <td>
                                                            <input type="checkbox"/>
                                                        </td>
                                                        <td>Test 1</td>
                                                        <td class="sorting_1">10/11/2015</td>
                                                        <td>10</td>
                                                        <td>2</td>
                                                        <td>30</td>
                                                        <td>0%</td>
                                                        <td>0%</td>
                                                    </tr>
                                                    <tr class="gradeX even" role="row">
                                                        <td>
                                                            <input type="checkbox"/>
                                                        </td>
                                                        <td>Test 2</td>
                                                        <td class="sorting_1">23/03/2016</td>
                                                        <td>30</td>
                                                        <td>0</td>
                                                        <td>60</td>
                                                        <td>10%</td>
                                                        <td>70%</td>
                                                    </tr>

                                                    <tr class="gradeX even" role="row">
                                                        <td>
                                                            <input type="checkbox"/>
                                                        </td>
                                                        <td>Test 3</td>
                                                        <td class="sorting_1">15/11/2015</td>
                                                        <td>0</td>
                                                        <td>10</td>
                                                        <td>100</td>
                                                        <td>5%</td>
                                                        <td>15%</td>                                            
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>                    
                        </div>
                    </div>
                    
                    <h1> DA COMPLETARE </h1>
                    <div class="form-actions row">
                        <div class="col-md-9"></div>
                            <button type="button" class="btn default">Annulla</button>
                            <button type="submit" class="btn blue">Conferma</button>
                        </div>
                    </div>
                </form>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php include VIEW_DIR . "footer.php"; ?>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<?php include VIEW_DIR . "js.php"; ?>

<!--Script specifici per la pagina -->
<script src="/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        //QuickSidebar.init(); // init quick sidebar
        //Demo.init(); // init demo features
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>