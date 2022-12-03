<?php

namespace Payment\Enum;

abstract class SpPaymentStatus
{
    const AwaitingAuthorization = "AWAITING_AUTHORIZATION";
    const Pending = "PENDING";
    const Completed = "COMPLETED";
    const Rejected = "REJECTED";
}