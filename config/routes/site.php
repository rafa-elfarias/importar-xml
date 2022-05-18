<?php

use \ImportarXML\Controller\XMLController;

$app->get('/', XMLController::class . ':index');

$app->post('/enviar-nf', XMLController::class . ':enviar_nota_fiscal');

$app->get('/ver-nf/{id}', XMLController::class . ':ver_nota_fiscal');

?>