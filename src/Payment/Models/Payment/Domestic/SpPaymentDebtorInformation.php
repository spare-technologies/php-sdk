<?php

namespace Payment\Models\Payment\Domestic;

use Payment\Enum\SpGender;

class SpPaymentDebtorInformation
{
    public string $fullname;
    public string $email;
    public string $phone;
    public SpGender $gender;
    public string $CustomerReferenceId;

    function __construct(string $Fullname, string $Email, string $Phone, SpGender $Gender, string $CustomerReferenceId) {
        $this->id = $Id;
        $this->email = $Email;
        $this->phone = $Phone;
        $this->gender = $Gender;
        $this->CustomerReferenceId = $CustomerReferenceId;
    }

    /**
     * @return fullname
     */
    public function getFullname(): string
    {
        return $this->fullname;
    }

    /**
     * @return email
     */
    public function getEmail(string $email): string
    {
        return $this->email;
    }

    /**
     * @return phone
     */
    public function getPhone(string $phone): string
    {
        return $this->phone;
    }

    /**
     * @return gender
     */
    public function getGender(SpGender $phone): SpGender
    {
        return $this->gender;
    }

    /**
     * @return customerReferenceId
     */
    public function getCustomerReferenceId(string $CustomerReferenceId): string
    {
        return $this->CustomerReferenceId;
    }
    
}