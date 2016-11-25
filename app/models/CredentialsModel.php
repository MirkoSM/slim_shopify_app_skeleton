<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 29.09.16
 * Time: 11:03
 */

namespace app\models;

use app\core\Model;
use PDOException;

class CredentialsModel extends Model {

    public function getAccessToken ($shop) {
        try {
            $result = $this->db->prepare("
          SELECT app_access_token FROM app_credentials WHERE shop_name = :shop
        ");
            $result->execute([
                    ':shop' => $shop
                ]);

            return $result->fetch();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function saveAccessToken ($token, $shop) {
        try {
            $result = $this->db->prepare("
                UPDATE app_credentials
                SET app_access_token = :token WHERE shop_name = :shop
        ");
            $result->execute([
                ':token' => $token,
                ':shop' => $shop
            ]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function saveShop ($shop) {
        try {
            $result = $this->db->prepare("
                INSERT INTO app_credentials (shop_name)
                VALUES (:shop)
        ");
            $result->execute([
                ':shop' => $shop
            ]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}