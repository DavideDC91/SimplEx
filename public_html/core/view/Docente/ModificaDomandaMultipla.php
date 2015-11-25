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
                        Modifica una domanda a risposta multipla
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Ingegneria Del Software</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Use-Case</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Modifica Domanda Multipla</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="portlet box grey-cascade">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-globe"></i>Modifica Domanda Multipla
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse" data-original-title="" title="">
                                </a>
                                <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
                                </a>
                                <a href="javascript:;" class="reload" data-original-title="" title="">
                                </a>
                                <a href="javascript:;" class="remove" data-original-title="" title="">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="#" class="form-horizontal form-bordered">
                                <div class="form-body">
                                    <div class="form-group form-md-line-input has-success" style="height: 100px">
                                        <label class="control-label col-md-3">Inserisci Testo Domanda</label>
                                        <div class="col-md-6">
                                            <input type="text" value="Precedente testo domanda" class="form-control">
                                            <span class="help-block">
                                                Inserisci il testo della domanda </span>
                                        </div>
                                    </div>
                                    <div class="form-group form-md-line-input has-success ratio" style="height: 100px">
                                        <div class="control-label col-md-1">
                                            <span class="checked"><input type="radio" name="optionsRadios2" value="option1"></span>
                                        </div>
                                        <label class="control-label col-md-2">
                                            Inserisci Testo Risposta</label>
                                        <div class="col-md-6">
                                            <input type="text" value="Precedente testo risposta" class="form-control">
                                            <span class="help-block">
                                                Inserisci il testo della risposta </span>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="javascript:;" class="btn sm green-jungle">
                                                <i class="fa fa-plus"></i> Aggiungi
                                            </a>
                                            <a href="javascript:;" class="btn sm red-intense">
                                                <i class="fa fa-minus"></i> Rimuovi
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group form-md-line-input has-success ratio" style="height: 100px">
                                        <label class="control-label col-md-1">
                                            <span class="checked"><input type="radio" name="optionsRadios2" value="option2"></span>
                                        </label>
                                        <label class="control-label col-md-2">
                                            Inserisci Testo Risposta</label>
                                        <div class="col-md-6">
                                            <input type="text" value="Precedente testo risposta"  class="form-control">
                                            <span class="help-block">
                                                Inserisci il testo della risposta </span>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="javascript:;" class="btn sm green-jungle">
                                                <i class="fa fa-plus"></i> Aggiungi
                                            </a>
                                            <a href="javascript:;" class="btn sm red-intense">
                                                <i class="fa fa-minus"></i> Rimuovi
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group form-md-line-input has-success" style="height: 100px">
                                        <label class="control-label col-md-3">Inserisci Punteggio Esatta</label>
                                        <div class="col-md-4">
                                            <input type="number" value="Precedente Punteggio" class="form-control">
                                            <span class="help-block">
                                                Inserisci il punteggio per risposta esatta </span>
                                        </div>
                                    </div>
                                    <div class="form-group form-md-line-input has-success" style="height: 100px">
                                        <label class="control-label col-md-3">Inserisci Punteggio Errata</label>
                                        <div class="col-md-4">
                                            <input type="number" value="Precedente Punteggio Numerico" class="form-control">
                                            <span class="help-block">
                                                Inserisci il punteggio per risposta errata </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <a href="javascript:;" class="btn sm green-jungle"><span class="md-click-circle md-click-animate" style="height: 94px; width: 94px; top: -23px; left: 2px;"></span>
                                                        Conferma
                                                    </a>
                                                    <a href="javascript:;" class="btn sm red-intense">
                                                        Annulla
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
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
