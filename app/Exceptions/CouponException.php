<?php

namespace App\Exceptions;

use Exception;

/**
 * Base class for all business-rule exceptions thrown by the Service layer.
 * Caught centrally in bootstrap/app.php withExceptions() for consistent
 * JSON error responses on API requests.
 */
class CouponException extends Exception
{
    protected string $code_ = 'COUPON_ERROR';

    protected int $status = 422;

    public function errorCode(): string
    {
        return $this->code_;
    }

    public function statusCode(): int
    {
        return $this->status;
    }
}
