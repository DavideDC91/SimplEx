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

            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <form>
                <fieldset>
                    <legend> Test </legend>
                    <h3> Domanda 1 (multipla) </h3>
                    <p><input type = "checkbox"/>Risposta 1</p>
                    <p><input type = "checkbox"/>Risposta 2</p>
                    <p><input type = "checkbox"/>Risposta 3</p>
                    <p><input type = "checkbox"/>Risposta 4</p>
                    
                    <h3> Domanda 2 (aperta)</h3>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Inserisci risposta" style="resize:none"></textarea>
                    </div>
                    <h3> Domanda 3 (multipla)</h3>
                    <p><input type = "checkbox"/>Risposta 1</p>
                    <p><input type = "checkbox"/>Risposta 2</p>
                    <p><input type = "checkbox"/>Risposta 3</p>
                    <p><input type = "checkbox"/>Risposta 4</p>
                
           
             <div class="row">
                <div class="col-md-12">
                    <div class="col-md-9"></div>
                    <button type="button" class="btn green">Abbandona</button> 
                    <button type="submit" class="btn green">Conegna</button>  
                </div>
            </div>
                    </fieldset>
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
