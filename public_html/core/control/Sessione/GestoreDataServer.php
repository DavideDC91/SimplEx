<?php

/**
 * Questo Control ritorna alla pagina richiedente la data attuale.
 * @author Antonio Luca D'Avanzo
 * @version 1
 * @since  18/12/2015 12:45
 */

$response= date('Y-m-d H:i:s ', time());
echo $response;

