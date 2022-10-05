<?php

namespace Payment\Models\Response;

use Payment\Models\SpBaseModel;

class SpSdkPaymentsResponse extends SpBaseModel
{
    public ?string $error;
    public ?array $data;

    /**
     * @param array|null $data
     */
    public function __construct(?array $data)
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
     * @return array|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

}