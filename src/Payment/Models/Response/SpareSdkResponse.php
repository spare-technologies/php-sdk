<?php


namespace Payment\Models\Response;


class SpareSdkResponse
{
    public string $error;
    public  mixed $data;
    public  mixed $meta;

    function __construct(string $Error, mixed $Data, mixed $Meta) {
        $this->error = $Error;
        $this->data = $Data;
        $this->meta = $Meta;
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }

    /**
     * @param string $error
     */
    public function setError(string $error): void
    {
        $this->error = $error;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getMeta()
    {
        return $this->meta;
    }

}