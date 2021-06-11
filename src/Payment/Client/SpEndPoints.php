<?php


namespace Payment\Client;

class SpEndPoints
{
    public static string $CreateDomesticPayment = '/api/v1.0/payments/domestic/Create';
    public static string $GetDomesticPayment = '/api/v1.0/payments/domestic/Get';
    public static string $ListDomesticPayment = '/api/v1.0/payments/domestic/List';
}