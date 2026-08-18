<?php

namespace App\Exceptions;

class DuplicateClaimException extends CouponException
{
    protected string $code_ = 'DUPLICATE_CLAIM';

    protected int $status = 409;

    public function __construct()
    {
        parent::__construct('You have already claimed this offer recently. Please check your email.');
    }
}
