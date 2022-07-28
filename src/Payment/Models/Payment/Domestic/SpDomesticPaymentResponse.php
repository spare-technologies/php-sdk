<?php


namespace Payment\Models\Payment\Domestic;


use Payment\Enum\SpPaymentSource;
use Payment\Models\Payment\Account\SpPaymentUserAccount;
use Payment\Models\Payment\Account\SpUserAccount;
use Payment\Models\Payment\Domestic\SpDomesticPayment;

class SpDomesticPaymentResponse extends SpDomesticPayment
{
    public string $id;
    public string $reference;
    public string $currency;
    public SpUserAccount $issuer;
    public ?SpPaymentSource $issuedFrom;
    public SpPaymentUserAccount $debtor;
    public string $link;
    public string $createdAt;

    function __construct(string $Id, string $Reference, string $Currency,
                         SpUserAccount $Issuer, ?SpPaymentSource $IssuedFrom,
                         SpPaymentUserAccount $Debtor, string $Link, string $CreatedAt) {
        $this->id = $Id;
        $this->reference = $Reference;
        $this->currency = $Currency;
        $this->issuer = $Issuer;
        $this->issuedFrom = $IssuedFrom;
        $this->debtor = $Debtor;
        $this->link = $Link;
        $this->createdAt = $CreatedAt;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $Id
     */
    public function setId(string $Id): void
    {
        $this->id = $Id;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param string @Reference
     */
    public function setReference(string $Reference): void
    {
        $this->reference = $Reference;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $Currency
     */
    public function setCurrency(string $Currency): void
    {
        $this->currency = $Currency;
    }

    /**
     * @return SpUserAccount
     */
    public function getIssuer(): SpUserAccount
    {
        return $this->issuer;
    }

    /**
     * @param SpUserAccount $Issuer
     */
    public function setIssuer(SpUserAccount $Issuer): void
    {
        $this->issuer = $Issuer;
    }

    /**
     * @return SpPaymentUserAccount
     */
    public function getDebtor(): SpPaymentUserAccount
    {
        return $this->debtor;
    }

    /**
     * @param SpPaymentUserAccount $Debtor
     */
    public function setDebtor(SpPaymentUserAccount $Debtor): void
    {
        $this->debtor = $Debtor;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }


    /**
     * @param string @CreatedAt
     */
    public function setCreatedAt(string $CreatedAt): void
    {
        $this->createdAt = $CreatedAt;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string @Link
     */
    public function setLink(string $Link): void
    {
        $this->link = $Link;
    }

    /**
     * @return SpPaymentSource|null
     */
    public function getIssuedFrom(): ?SpPaymentSource
    {
        return $this->issuedFrom;
    }

    /**
     * @param SpPaymentSource $IssuedFrom
     */
    public function setIssuedFrom(SpPaymentSource $IssuedFrom): void
    {
        $this->issuedFrom = $IssuedFrom;
    }

}