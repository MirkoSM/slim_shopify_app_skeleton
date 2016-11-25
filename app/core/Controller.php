<?php

namespace app\core;

use Interop\Container\ContainerInterface;
use GuzzleHttp;
use app\models\CredentialsModel;

class Controller {
    protected $ci;

    public $apiKey;
    public $secret;
    public $scope;
    public $shop;
    public $baseUrl;

    public function __construct(ContainerInterface $ci) {
        $this->ci = $ci;

        $config = require_once ROOT_DIR . '/app/config/shopifyCredentials.php';

        $this->apiKey = $config['apiKey'];
        $this->secret = $config['secret'];
        $this->scope = $config['scope'];
        $this->shop = $config['shop'];
        $this->baseUrl = $config['baseUrl'];
    }

    public function responseData ($data) {
        echo json_encode($data);
        exit;
    }

    public function getAccessToken () {
        $credentialsModel = new CredentialsModel();

        $token = $credentialsModel->getAccessToken($this->shop);

        return $token;
    }
}
