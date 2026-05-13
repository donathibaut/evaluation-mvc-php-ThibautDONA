<?php

namespace App\Services;

use App\Models\UserModel;

class UserService {
    private $userModel;

    /**
     * Constructor
     * 
     * @param PDO $db call the model
     */
    public function __construct($db)
    {
        $this->userModel = new UserModel($db);
    }

    /**
     * Authenticate the connecting user
     * 
     * @return array user data
     */
    public function auth($mail, $password) {

        $user = $this->userModel->findOne($mail);

        if($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }
}

?>