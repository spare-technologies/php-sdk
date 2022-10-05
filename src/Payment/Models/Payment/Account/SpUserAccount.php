<?php


namespace Payment\Models\Payment\Account;


class SpUserAccount extends SpAccount
{
    public string $customerReferenceId;

    public string $customerPaymentLink;

    /**
     * @param string $customerReferenceId
     */
    public function setCustomerReferenceId(string $customerReferenceId): void
    {
        $this->customerReferenceId = $customerReferenceId;
    }

    /**
     * @param string $customerPaymentLink
     */
    public function setCustomerPaymentLink(string $customerPaymentLink): void
    {
        $this->customerPaymentLink = $customerPaymentLink;
    }

    /**
     * Get payment link
     * @return string
     */
    public function getCustomerPaymentLink(): string
    {
        return $this->customerPaymentLink;
    }

    /**
     * Get customer reference id
     * @return string
     */
    public function getCustomerReferenceId(): string
    {
        return $this->customerReferenceId;
    }
}