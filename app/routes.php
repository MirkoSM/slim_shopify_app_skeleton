<?php


$app->post('/auth', 'app\controllers\AuthController:auth');

$app->get('/get_code', 'app\controllers\AuthController:getCode');
$app->get('/update_code', 'app\controllers\AuthController:updateCode');

$app->get('/main', 'app\controllers\UserInterfaceController:mainPage');