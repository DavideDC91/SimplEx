<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 18/11/15
 * Time: 10:33
 */
include_once CONTROL_DIR . "AuthController.php";
$controller = new AuthController();
/** @var Exception $error */
$error = null;
try {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'login': {
                $controller->login($_POST['username'], $_POST['password']);
            }
                break;
            case 'register': {
                //todo prendi campi da $_POST e passa al controller
            }
                break;
            case 'reset': {
                //todo vedi 'register'
            }
                break;
        }
    }
} catch (UserNotFoundException $ex) {
    $error = $ex;
}
?>

<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="it">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Simplex | Login</title>
    <?php include VIEW_DIR . "header.php"; ?>

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="/assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/pages/css/login-soft.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL SCRIPTS -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="index.html">
        <img src="/assets/admin/layout/img/logo-big.png" alt=""/>
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="" method="post">
        <input type="hidden" name="action" value="login">

        <h3 class="form-title">Effetua il login</h3>

        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
			<span>
			Inserisci username e password. </span>
        </div>
        <?php
        if ($error != null && $error instanceof UserNotFoundException) {
            echo "<h4>" . $error->getMessage() . "</h4>";
        }
        ?>

        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Username</label>

            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username"
                       name="username"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>

            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password"
                       name="password"/>
            </div>
        </div>
        <div class="form-actions">
            <label class="checkbox">
                <input type="checkbox" name="remember" value="1"/> Resta collegato </label>
            <button type="submit" class="btn blue pull-right">
                Login <i class="m-icon-swapright m-icon-white"></i>
            </button>
        </div>
        <div class="forget-password">
            <h4>Hai dimenticato la password?</h4>

            <p>
                nessun problema, clicca <a href="javascript:;" id="forget-password">
                    qui </a>
                per resettarla.
            </p>
        </div>
        <div class="create-account">
            <p>
                Non hai ancora account ?&nbsp; <a href="javascript:;" id="register-btn">
                    Registrazione </a>
            </p>
        </div>
    </form>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" action="" method="post">
        <input type="hidden" name="action" value="reset">

        <h3>Hai dimenticato la password ?</h3>

        <p>
            Inserisci la tua email sotto per effettuare il reset.
        </p>

        <div class="form-group">
            <div class="input-icon">
                <i class="fa fa-envelope"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email"
                       name="email"/>
            </div>
        </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn">
                <i class="m-icon-swapleft"></i> Indietro
            </button>
            <button type="submit" class="btn blue pull-right">
                Resetta <i class="m-icon-swapright m-icon-white"></i>
            </button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
    <!-- BEGIN REGISTRATION FORM -->
    <form class="register-form" action="" method="post">
        <input type="hidden" name="action" value="register">

        <h3>Registrazione</h3>

        <p>
            Inserisci i dati personali:
        </p>

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Nome</label>

            <div class="input-icon">
                <i class="fa fa-font"></i>
                <input class="form-control placeholder-no-fix" type="text" placeholder="Nome" name="name"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Cognome</label>

            <div class="input-icon">
                <i class="fa fa-header"></i>
                <input class="form-control placeholder-no-fix" type="text" placeholder="Cognome" name="surname"/>
            </div>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Matricola</label>

            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" placeholder="Matricola" name="matricola"/>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Corso di laurea</label>
            <select name="country" id="select2_sample4" class="select2 form-control">
                <option value=""></option>
                <?php
                $corsi = $controller->getCDL();
                foreach ($corsi as $corso) {
                    echo "<option value='$corso->codice'>$corso->nome</option>";
                }
                ?>
            </select>
        </div>
        <p>
            Dati relativi all'account:
        </p>

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Nome utente</label>

            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email"
                       name="email"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>

            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password"
                       placeholder="Password" name="password"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Inserisci la password di nuovo</label>

            <div class="controls">
                <div class="input-icon">
                    <i class="fa fa-check"></i>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off"
                           placeholder="Inserisci la password di nuovo" name="rpassword"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" name="tnc"/> Consento trattamento<a href="javascript:;">
                    dei dati personali </a>
            </label>

            <div id="register_tnc_error">
            </div>
        </div>
        <div class="form-actions">
            <button id="register-back-btn" type="button" class="btn">
                <i class="m-icon-swapleft"></i> Indietro
            </button>
            <button type="submit" id="register-submit-btn" class="btn blue pull-right">
                Conferma <i class="m-icon-swapright m-icon-white"></i>
            </button>
        </div>
    </form>
    <!-- END REGISTRATION FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
    2014 &copy; Metronic - Admin Dashboard Template.
</div>
<!-- END COPYRIGHT -->

<?php include VIEW_DIR . "js.php"; ?>

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/assets/global/plugins/select2/select2.min.js"></script>
<script src="/assets/admin/pages/scripts/login-soft.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Login.init();
        Demo.init();
        // init background slide images
        $.backstretch([
                "/assets/admin/pages/media/bg/1.jpg",
                "/assets/admin/pages/media/bg/2.jpg",
                "/assets/admin/pages/media/bg/3.jpg",
                "/assets/admin/pages/media/bg/4.jpg"
            ], {
                fade: 1000,
                duration: 8000
            }
        );
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
