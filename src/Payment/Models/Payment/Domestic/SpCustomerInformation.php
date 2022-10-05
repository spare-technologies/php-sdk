<?php

namespace Payment\Models\Payment\Domestic;

final class SpCustomerInformation
{
    public string $fullname;

    public string $email;

    public string $phone;

    public string $customerReferenceId;

    /**
     * Get full name
     * @return string
     */
    public function getFullname(): string
    {
        return $this->fullname;
    }

    /**
     * Set full name
     * @param string $fullname
     */
    public function setFullname(string $fullname): void
    {
        $this->fullname = $fullname;
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
     * Set email
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Get phone
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * Set phone
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * Get customer reference
     * @return string
     */
    public function getCustomerReferenceId(): string
    {
        return $this->customerReferenceId;
    }

    /**
     * Set customer reference
     * @param string $customerReferenceId
     */
    public function setCustomerReferenceId(string $customerReferenceId): void
    {
        $this->customerReferenceId = $customerReferenceId;
    }
}