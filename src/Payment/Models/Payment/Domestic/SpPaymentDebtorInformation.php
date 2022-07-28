<?php

namespace Payment\Models\Payment\Domestic;

use Payment\Enum\SpGender;

class SpPaymentDebtorInformation
{
    public string $fullname;
    public string $email;
    public string $phone;
    public string $customerReferenceId;

    function __construct(string $Fullname, string $Email, string $Phone, string $CustomerReferenceId) {
        $this->fullname = $Fullname;
        $this->email = $Email;
        $this->phone = $Phone;
        $this->customerReferenceId = $CustomerReferenceId;
    }

    /**
     * @return string
     */
    public function getFullname(): string
    {
        return $this->fullname;
    }

    /**
     * @param string $fullname
     */
    public function setFullname(string $fullname): void
    {
        $this->fullname = $fullname;
    }

    /**
     * @return string
     */
    public function getEmail(string $email): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getCustomerReferenceId(): string
    {
        return $this->customerReferenceId;
    }

    /**
     * @param string $customerReferenceId
     */
    public function setCustomerReferenceId(string $customerReferenceId): void
    {
        $this->customerReferenceId = $customerReferenceId;
    }
    
}