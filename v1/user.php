<?php
require('../db.php');

class User {

    /**
     * GET /user/{id}
     * GET /user/
     * 
     * @param mixed $id
     * @return array
     */
    public function get($id = null) {

        $result = [];
        if (empty($id)) {
            $result = $this->getUsers();
        } else {
            if ($this->isValidId($id)) {
                $result = $this->getUser($id);
            } else {
                $result = ['result' => 'invalid'];
            }
        }
        return $result;
    }

    /**
     * validate id
     * 
     * @param string $id
     * @return true:valid id, false: invalid id
     */
    private function isValidId($id) {

        if (!is_numeric($id)) {
            return false;
        }

        $intId = (int) $id;
        if (!is_int($intId)) {
            return false;
        }

        return true;
    }

    /**
     * get a user data
     * 
     * @param int $id
     * @return array | null
     */
    private function getUser($id) {
        $result = null;
        $pdo = create_pdo();
        try {
            $stmt = $pdo->prepare("SELECT * FROM user WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch();
        } catch (Exception $e) {
            error_log($e);
        }

        return $result;
    }

    /**
     * get users data
     * 
     * @param int $id
     * @return array | null
     */
    private function getUsers() {
        $result = null;
        $pdo = create_pdo();
        try {
            $stmt = $pdo->prepare("SELECT * FROM user WHERE id");
            $stmt->execute();
            $result = $stmt->fetchAll();
        } catch (Exception $e) {
            error_log($e);
        }

        return $result;
    }

}