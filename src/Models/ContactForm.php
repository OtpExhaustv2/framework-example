<?php

namespace App\Models;

use Svv\Framework\Model;

class ContactForm extends Model
{

    public string $subject = "";
    public string $email = "";
    public string $body = "";

    public function rules (): array
    {
        return [
            "subject" => [self::RULE_REQUIRED],
            "email"   => [self::RULE_REQUIRED, self::RULE_EMAIL],
            "body"    => [self::RULE_REQUIRED],
        ];
    }

    public function labels (): array
    {
        return [
            "subject" => "Enter your subject",
            "email"   => "Your email",
            "body"    => "Your body",
        ];
    }

    public function send ()
    {
        return true;
    }

    /**
     * @return string
     */
    public function getSubject (): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject (string $subject): void
    {
        $this->subject = $subject;
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
    public function getBody (): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody (string $body): void
    {
        $this->body = $body;
    }

}
