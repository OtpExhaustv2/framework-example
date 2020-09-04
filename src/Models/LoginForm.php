<?php

namespace App\Models;

use Svv\Framework\Model;
use Svv\Framework\App;

class LoginForm extends Model
{

    public string $email = "";
    public string $password = "";

    public function rules (): array
    {
        return [
            "email"    => [self::RULE_REQUIRED, self::RULE_EMAIL],
            "password" => [self::RULE_REQUIRED],
        ];
    }

    public function labels (): array
    {
        return [
            "email"    => "Email",
            "password" => "Password",
        ];
    }

    public function login ()
    {
        $user = User::findOne(["email" => $this->email]);
        if (!$user)
        {
            $this->addError("email", "User does not exist with this email");
            return false;
        }

        if (!password_verify($this->getPassword(), $user->getPassword()))
        {
            $this->addError("password", "Password is incorrect");
            return false;
        }

        return App::$app->login($user);
    }

    /**
     * @return string
     */
    public function getEmail (): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail (string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword (): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword (string $password): void
    {
        $this->password = $password;
    }

}
