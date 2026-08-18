<?php

namespace App\Exceptions;

class CouponGenerationException extends CouponException
{
    protected string $code_ = 'COUPON_GENERATION_FAILED';

    protected int $status = 500;

    public function __construct()
    {
        parent::__construct('Unable to generate a unique coupon code. Please try again.');
    }
}
