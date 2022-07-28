<?php

namespace Payment\Models\Payment\Account;

class SpAccount 
{
    public string $id;
    public string $email;
    public string $fullname;
    public string $phone;

    function __construct(string $Id, string $Email, string $fullname, string $phone) {
        $this->id = $id;
        $this->email = $email;
        $this->fullname = $fullname;
        $this->phone = $phone;
    }
}