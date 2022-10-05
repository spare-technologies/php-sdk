<?php


namespace Payment\Models\Payment\Account;


final class SpPaymentUserAccount
{
    public SpUserAccount $account;
    public SpUserPaymentBankAccount $bankAccount;

    /**
     * @param SpUserAccount $account
     */
    public function setAccount(SpUserAccount $account): void
    {
        $this->account = $account;
    }

    /**
     * @param SpUserPaymentBankAccount $bankAccount
     */
    public function setBankAccount(SpUserPaymentBankAccount $bankAccount): void
    {
        $this->bankAccount = $bankAccount;
    }


    /**
     * Get account
     * @return SpUserAccount
     */
    public function getAccount(): SpUserAccount
    {
        return $this->account;
    }

    /**
     * Get payment bank account
     * @return SpUserPaymentBankAccount
     */
    public function getBankAccount(): SpUserPaymentBankAccount
    {
        return $this->bankAccount;
    }
}