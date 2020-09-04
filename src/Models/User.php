<?php

namespace App\Models;

use Svv\Framework\DbModel;
use Svv\Framework\UserModel;

class User extends UserModel
{

    public const STATUS_INACTIVE = 0;
    public const STATUS_ACTIVE = 1;
    public const STATUS_DELETED = 2;

    private string $firstname = "";
    private string $lastname = "";
    private string $email = "";
    private int $status = self::STATUS_INACTIVE;
    private string $password = "";
    private string $passwordConfirm = "";

    public function rules (): array
    {
        return [
            "firstname"       => [self::RULE_REQUIRED],
            "lastname"        => [self::RULE_REQUIRED],
            "email"           => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
            "password"        => [self::RULE_REQUIRED, [self::RULE_MIN, "min" => 2], [self::RULE_MAX, "max" => 20]],
            "passwordConfirm" => [self::RULE_REQUIRED, [self::RULE_MATCH, "match" => "password"]],
        ];
    }

    public function tableName (): string
    {
        return "users";
    }

    public function attributes (): array
    {
        return ["firstname", "lastname", "email", "password", "status"];
    }

    public function save ()
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function labels (): array
    {
        return [
            "firstname" => "First name",
            "lastname" => "Last name",
            "email" => "Email",
            "password" => "Password",
            "passwordConfirm" => "Confirm password",
        ];
    }

    public static function primaryKey (): string
    {
        return "id";
    }

    public function getDisplayName (): string
    {
        return $this->firstname . " " . $this->lastname;
    }

    /**
     * @return string
     */
    public function getFirstname (): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname (string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname (): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname (string $lastname): void
    {
        $this->lastname = $lastname;
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

    /**
     * @return string
     */
    public function getPasswordConfirm (): string
    {
        return $this->passwordConfirm;
    }

    /**
     * @param string $passwordConfirm
     */
    public function setPasswordConfirm (string $passwordConfirm): void
    {
        $this->passwordConfirm = $passwordConfirm;
    }

    /**
     * @return int
     */
    public function getStatus (): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus (int $status): void
    {
        $this->status = $status;
    }

}
