<?php


namespace Payment\Models\Payment\Domestic;


use Helpers\Serialization\SpSerializer;
use Payment\Enum\SpPaymentSource;
use Payment\Models\Payment\Account\SpPaymentUserAccount;
use Payment\Models\Payment\Account\SpUserAccount;
use Payment\Models\Payment\Domestic\SpPayment;
use Payment\Models\Response\SpSdkPaymentsResponse;
use Payment\Models\SpPaymentUserAccount\SpPaymentIssuer;

final class SpPaymentResponse extends SpDomesticPayment
{
    public string $id;
    public string $reference;
    public string $orderId;
    public string $currency;
    public SpPaymentIssuer $issuer;
    public string $issuedFrom;
    public SpPaymentUserAccount $debtor;
    public string $link;
    public string $createdAt;
    public string $status;

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $reference
     */
    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @param string $orderId
     */
    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @param SpPaymentIssuer $issuer
     */
    public function setIssuer(SpPaymentIssuer $issuer): void
    {
        $this->issuer = $issuer;
    }

    /**
     * @param string $issuedFrom
     */
    public function setIssuedFrom(string $issuedFrom): void
    {
        $this->issuedFrom = $issuedFrom;
    }

    /**
     * @param SpPaymentUserAccount $debtor
     */
    public function setDebtor(SpPaymentUserAccount $debtor): void
    {
        $this->debtor = $debtor;
    }

    /**
     * @param string $link
     */
    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
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
     * Get reference
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * Get order id
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * Get currency
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * Get issuer account
     * @return SpPaymentIssuer
     */
    public function getIssuer(): SpPaymentIssuer
    {
        return $this->issuer;
    }

    /**
     * Get payment issuing source
     * @return string
     */
    public function getIssuedFrom(): string
    {
        return $this->issuedFrom;
    }

    /**
     * Get payment debtor
     * @return SpPaymentUserAccount
     */
    public function getDebtor(): SpPaymentUserAccount
    {
        return $this->debtor;
    }

    /**
     * Get payment link
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * Get created at
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}