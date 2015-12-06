<?php
/**
 * Created by PhpStorm.
 * User: fede_dr
 * Date: 5/12/15
 * Time: 09:57
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
    <title>Prova Form</title>
    <?php include VIEW_DIR . "header.php"; ?>

    <script src="/assets/admin/pages/scripts/gen_validatorv4.js"></script>

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
                Prova Form
            </h3>

            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="../../../gestionale/admin/index.html">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="">ProvaForm2</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->

            <div class="row">
                <div class="col-md-12">

                    <form id="myform" method="post" action="" onclick="controll()">

                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box blue-madison">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-globe"></i>Prova Form
                                </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse" data-original-title="" title="">
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">

                                <div id="form1" class="form-group form-md-line-input">
                                    <div class="col-md-10">
                                        <input type="number" id="prova1" name="prova1" class="form-control" placeholder="inserisci numero">
                                        <div class="form-control-focus"> </div>
                                        <span id='myform_prova1_errorloc' class="help-block"></span>
                                    </div>
                                </div>

                                <div id="form2" class="form-group form-md-line-input">
                                    <div class="col-md-10">
                                        <input type="text" id="prova2" name="prova2" class="form-control" placeholder="inserisci 20 char">
                                        <div class="form-control-focus"> </div>
                                        <span id='myform_prova2_errorloc' class="help-block"></span>
                                    </div>
                                </div>

                                <div id="form3" class="form-group form-md-line-input">
                                    <div class="col-md-10">
                                        <input type="text" id="prova3" name="prova3" class="form-control" placeholder="inserisci 10 char">
                                        <div class="form-control-focus"> </div>
                                        <span id='myform_prova3_errorloc' class="help-block"></span>
                                    </div>
                                </div>

                                <div id="form4" class="form-group form-md-line-input">
                                    <div class="col-md-10">
                                    <select class="form-control" name="prova4" id="prova4">
                                        <option value="">Select</option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                    </select>
                                        <div class="form-control-focus"> </div>
                                        <span id='myform_prova4_errorloc' class="help-block"></span>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-actions">
                                    <div class="col-md-4">
                                        <button type="submit" class="btn green-jungle">Conferma</button>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="reset" value="Annulla" class="btn red-intense"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <script type="text/javascript">

                        var frmvalidator  = new Validator("myform");

                        frmvalidator.addValidation("prova1","req","completare campo!");
                        frmvalidator.addValidation("prova1","numeric","inserire un numero!");

                        frmvalidator.addValidation("prova2","req","completare campo!");
                        frmvalidator.addValidation("prova2","minlen=20","inserire 20 char!");

                        frmvalidator.addValidation("prova3","req","completare campo!");
                        frmvalidator.addValidation("prova3","minlen=10","inserire 10 char!");

                        frmvalidator.addValidation("prova4","req","selezionare un campo!");
                        frmvalidator.addValidation("prova4","dontselect=''");


                        frmvalidator.EnableOnPageErrorDisplay();
                        frmvalidator.EnableMsgsTogether();


                        function controll() {

                            if(document.getElementById("myform_prova1_errorloc").innerHTML != "") {
                                document.getElementById("form1").setAttribute("class", "form-group form-md-line-input has-error");
                            }
                            else {
                                document.getElementById("form1").setAttribute("class", "form-group form-md-line-input");
                            }
                            if(document.getElementById("myform_prova2_errorloc").innerHTML != "") {
                                document.getElementById("form2").setAttribute("class", "form-group form-md-line-input has-error");
                            }
                            else {
                                document.getElementById("form2").setAttribute("class", "form-group form-md-line-input");
                            }
                            if(document.getElementById("myform_prova3_errorloc").innerHTML != "") {
                                document.getElementById("form3").setAttribute("class", "form-group form-md-line-input has-error");
                            }
                            else {
                                document.getElementById("form3").setAttribute("class", "form-group form-md-line-input");
                            }
                            if(document.getElementById("myform_prova4_errorloc").innerHTML != "") {
                                document.getElementById("form4").setAttribute("class", "form-group form-md-line-input has-error");
                            }
                            else {
                                document.getElementById("form4").setAttribute("class", "form-group form-md-line-input");
                            }
                        }

                    </script>

                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>


        <!-- END PAGE CONTENT-->
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
<!-- BEGIN PAGE LEVEL PLUGINS aggiunta da me-->
<script type="text/javascript" src="/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS aggiunta da me-->

<script src="/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<!-- BEGIN aggiunta da me -->
<script src="/assets/admin/pages/scripts/table-managed.js"></script>
<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        //QuickSidebar.init(); // init quick sidebar
        //Demo.init(); // init demo features
        TableManaged.init();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
