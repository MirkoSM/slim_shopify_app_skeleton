<?php

namespace app\controllers;


use app\core\Controller;
use app\models\CategoriesModel;
use ShopifyClient;

class UserInterfaceController extends Controller {

    public function mainPage ($request, $response) {

        $token = $this->getAccessToken();

        $sc = new ShopifyClient($this->shop, $token['app_access_token'], $this->apiKey, $this->secret);
        
        $this->ci->view->render($response, 'main-page.html.twig', [

        ]);
    }
}