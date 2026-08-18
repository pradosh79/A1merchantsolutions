<?php

namespace App\Exceptions;

class InvalidMerchantTokenException extends CouponException
{
    protected string $code_ = 'INVALID_MERCHANT_TOKEN';

    protected int $status = 403;

    public function __construct()
    {
        parent::__construct('Invalid or inactive merchant redemption link.');
    }
}
