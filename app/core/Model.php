<?php

namespace app\core;

use Slim\PDO\Database;

class Model {

    private static $instance;
    protected $db;


    public function __construct() {

        $config = require ROOT_DIR . '/app/config/db.php';

        $dsn = "mysql:host={$config['hostname']};dbname={$config['dbName']};charset=utf8";

        $this->db = new Database($dsn, $config['userName'], $config['password']);

    }

    /**
     * Getting Instance of Model
     * @return Model
     */
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}