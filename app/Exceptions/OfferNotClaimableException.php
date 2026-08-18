<?php

namespace App\Exceptions;

class OfferNotClaimableException extends CouponException
{
    protected string $code_ = 'OFFER_NOT_CLAIMABLE';

    protected int $status = 422;

    public static function inactive(): self
    {
        return new self('This offer is no longer active.');
    }

    public static function limitReached(): self
    {
        return new self('This offer has reached its maximum number of claims.');
    }

    public static function notStarted(): self
    {
        return new self('This offer is not available yet.');
    }

    public static function ended(): self
    {
        return new self('This offer has ended.');
    }
}
