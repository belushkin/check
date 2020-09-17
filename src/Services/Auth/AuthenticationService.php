<?php

namespace App\Services\Auth;

use App\DAO\IDAO;
use App\DAO\UsersDAO;
use App\Models\User;
use App\Services\Http\Request;

class AuthenticationService {

    const WRONG_METHOD_ERROR = 'Wrong method selected, please use POST';
    const WRONG_REQUEST_BODY = 'Please include email and password fields in the request';
    const USER_NOT_FOUND = 'There is no such user registered';

    private $errors;

    /** @var UsersDAO $usersDAO */
    private $usersDAO;

    public function __construct(IDAO $usersDAO)
    {
        session_start();
        $this->usersDAO = $usersDAO;
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param mixed $errors
     */
    public function setErrors($errors): void
    {
        $this->errors = $errors;
    }


    public function authenticate(Request $request): ?User
    {
        $body = $request->getBody();

        if (!$this->validate($body)) {
            return null;
        }

        $user = $this->usersDAO->findByEmailAndPassword(
            trim($body['email']),
            trim($body['password'])
        );
        if (!$user) {
            $this->errors = [
                'message' => self::USER_NOT_FOUND
            ];
            return null;
        }

        $user = User::fromObject($user);

        $this->saveUserToSession($user);

        return $user;
    }

    private function validate(array $body): bool
    {
        if (!$body) {
            $this->errors = [
                'message' => self::WRONG_METHOD_ERROR
            ];
            return false;
        }

        if (!isset($body['email']) || !isset($body['password'])) {
            $this->errors = [
                'message' => self::WRONG_REQUEST_BODY
            ];
            return false;
        }

        return true;
    }

    private function saveUserToSession(User $user)
    {
        $_SESSION['email'] = $user->getEmail();
    }

    public function isLoggedIn() {
        return isset($_SESSION['email']);
    }

    public function getAuthenticatedUser()
    {
        $user = $this->usersDAO->findByEmail(
            trim($_SESSION['email'])
        );
        return User::fromObject($user);
    }
}
