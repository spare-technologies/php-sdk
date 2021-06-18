<?php


namespace Payment\Models\Response;


class SpareSdkResponse
{
    public string $error;
    public  mixed $data;
    public  mixed $meta;


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
    public function getData(): mixed
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getMeta(): mixed
    {
        return $this->meta;
    }

}