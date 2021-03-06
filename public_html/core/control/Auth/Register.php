<?php
/**
 * Gestione registrazione
 *
 * @author Sergio Shevchenko
 * @version 1.1
 * @since 25/11/15
 */
include_once MODEL_DIR . "UtenteModel.php";
try {
    $model = new UtenteModel();
    $user = $model->register($_POST['matricola'], $_POST['email'], $_POST['password'],
        "Studente", $_POST['name'], $_POST['surname'], $_POST['cdl_matricola']);
    $_SESSION['loggedin'] = true;
    $_SESSION['user'] = $user;

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