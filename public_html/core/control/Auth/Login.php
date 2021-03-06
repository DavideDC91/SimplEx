<?php
/**
 * Gestione Login
 *
 * @author Sergio Shevchenko
 * @version 1.2
 * @since 25/11/15
 */

include_once MODEL_DIR . "UtenteModel.php";

try {
    Logger::info("Richiesta login [" . $_POST['email'] . " " . $_POST['password'] . " " . @$_POST['remember'] . "]");
    $model = new UtenteModel();
    $user = $model->login($_POST['email'], $_POST['password'], (@$_POST['remember'] == "1" ? true : false));
    Logger::info("Login effettuato " . $user->getUsername());
    switch (@$user->getTipologia()) {
        case 'Docente':
            $redirect = "/docente";
            break;
        case 'Studente':
            $redirect = "/studente";
            break;
        case 'Admin':
            $redirect = "/admin";
            break;
        default:
            $redirect = "/";
    }
    echo json_encode(array('status' => true, 'redirect' => $redirect));
} catch (ApplicationException $ex) {
    Logger::warning("Errore nel login " . $ex);
    echo json_encode(array('status' => false, 'error' => $ex->getMessage()));
}