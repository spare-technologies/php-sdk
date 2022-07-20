<?php


namespace Payment\Models\Payment\Domestic;


use Payment\Enum\SpPaymentSource;
use Payment\Models\Payment\Account\SpPaymentUserAccount;
use Payment\Models\Payment\Account\SpUserAccount;

class SpDomesticPaymentResponse
{
    public int $id;
    public string $reference;
    public string $currency;
    public SpUserAccount $issuer;
    public ?SpPaymentSource $issuedFrom;
    public SpPaymentUserAccount $debtor;
    public string $link;
    public string $createdAt;
    public string $amount;
    public string $description;

    function __construct(int $Id, string $Reference, string $Currency,
                         SpUserAccount $Issuer, ?SpPaymentSource $IssuedFrom,
                         SpPaymentUserAccount $Debtor, string $Link, string $CreatedAt, string $Amount, string $Description) {
        $this->id = $Id;
        $this->reference = $Reference;
        $this->currency = $Currency;
        $this->issuer = $Issuer;
        $this->issuedFrom = $IssuedFrom;
        $this->debtor = $Debtor;
        $this->link = $Link;
        $this->createdAt = $CreatedAt;
        $this->amount = $Amount;
        $this->description = $Description;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return SpUserAccount
     */
    public function getIssuer(): SpUserAccount
    {
        return $this->issuer;
    }

    /**
     * @return SpPaymentUserAccount
     */
    public function getDebtor(): SpPaymentUserAccount
    {
        return $this->debtor;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @return SpPaymentSource|null
     */
    public function getIssuedFrom(): ?SpPaymentSource
    {
        return $this->issuedFrom;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

     /**
     * @return string
     */
    public function getDEscription(): string
    {
        return $this->description;
    }


}