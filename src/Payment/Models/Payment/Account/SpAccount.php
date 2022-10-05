<?php

namespace Payment\Models\Payment\Account;

abstract class SpAccount
{
    public string $id;
    public string $email;
    public string $fullname;
    public string $phone;

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string $fullname
     */
    public function setFullname(string $fullname): void
    {
        $this->fullname = $fullname;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * Get id
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get email
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Get full name
     * @return string
     */
    public function getFullname(): string
    {
        return $this->fullname;
    }

    /**
     * Get phone
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }
}