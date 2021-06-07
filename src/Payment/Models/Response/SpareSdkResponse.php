<?php


namespace Payment\Models\Response;


class SpareSdkResponse
{
    public string $error;
    public T $data;
    public TV $meta;

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
     * @return T
     */
    public function getData(): T
    {
        return $this->data;
    }

    /**
     * @param T $data
     */
    public function setData(T $data): void
    {
        $this->data = $data;
    }

    /**
     * @return TV
     */
    public function getMeta(): TV
    {
        return $this->meta;
    }

    /**
     * @param TV $meta
     */
    public function setMeta(TV $meta): void
    {
        $this->meta = $meta;
    }

}