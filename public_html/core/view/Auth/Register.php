<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 25/11/15
 * Time: 20:42
 */

include_once CONTROL_DIR . "UtenteController.php";
$ctr = new UtenteController();
try {
    $ut = $ctr->register($_POST['matricola'], $_POST['email'], $_POST['password'],
        "Studente", $_POST['name'], $_POST['surname'], $_POST['cdl_matricola']);
    $user = $ctr->login($ut->getUsername(), $_POST['password'], false);
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
    echo json_encode(array("status" => true, 'redirect' => $redirect));
} catch (IllegalArgumentException $ex) {
    echo json_encode(array("status" => false, "error" => $ex->getMessage()));
} catch (ApplicationException $ex) {
    Logger::error("Registrazione fallita ex=" . $ex);
    if ($ex->getMessage() == Error::$MATRICOLA_ESISTE) {
        echo json_encode(array("status" => false, "error" => Error::$MATRICOLA_ESISTE));
    } else
        echo json_encode(array("status" => false, "error" => "Errore interno del sistema, riprova più tardi"));
}