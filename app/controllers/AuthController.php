<?php

namespace app\controllers;

use app\core\Controller;
use ShopifyClient;
use app\models\CredentialsModel;

class AuthController extends Controller {

    public function auth() {

        $shopUrl = $this->shop;

        if ($shopUrl) {
            $shopifyClient = new ShopifyClient($shopUrl, "", $this->apiKey, $this->secret);

            echo "<h3>link to this stuff in browser to activate or update your APP!!</h3>";
            echo "<p>" . $shopifyClient->getAuthorizeUrl($this->scope, $this->getUrlForAuth()) . "</p>";

            exit;
        }
    }

    public function getUrlForAuth () {

        // get the URL to the current page
        $pageURL = 'http';
        if ($_SERVER["HTTPS"] == "on") { $pageURL .= "s"; }
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["SCRIPT_NAME"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["SCRIPT_NAME"];
        }

        $pageURL .= '/get_code';

        return $pageURL;
    }

    public function getCode () {
        if (isset($_GET['code'])) {

            $shopifyClient = new ShopifyClient($_GET['shop'], "", $this->apiKey, $this->secret);

            $token = $shopifyClient->getAccessToken($_GET['code']);

            $credentialsModel = new CredentialsModel();

            if ($credentialsModel->saveShop($_GET['shop']) &&
                $credentialsModel->saveAccessToken($token, $_GET['shop'])) {
                header("Location: {$this->baseUrl}main");
                exit;
            } else {
                echo "SQL Problem with saving Access Token";
            }
        }
    }
}
