<?php


namespace Payment\Models\Response;


use Payment\Models\Payment\Domestic\SpPaymentResponse;
use Payment\Models\SpBaseModel;

class SpSdkPaymentResponse extends SpBaseModel
{
    public ?string $error;
    public ?SpPaymentResponse $data;

    /**
     * @param SpPaymentResponse|null $data
     */
    public function __construct(?SpPaymentResponse $data)
    {
        $this->data = $data;
    }

    /**
     * @return string|null
     */
    public function getError(): ?string
    {
        return $this->error;
    }

    /**
     * @return SpPaymentResponse|null
     */
    public function getData(): ?SpPaymentResponse
    {
        return $this->data;
    }
}