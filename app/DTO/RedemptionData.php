<?php

namespace App\DTO;

use App\Enums\RedemptionResult;

/**
 * Standardized outcome returned by RedemptionService::redeem() so
 * the controller / API layer never has to inspect raw model state.
 */
final class RedemptionData
{
    public function __construct(
        public readonly RedemptionResult $result,
        public readonly bool $success,
        public readonly string $message,
        public readonly ?array $claim = null,
    ) {
    }

    public static function fromResult(RedemptionResult $result, ?array $claim = null): self
    {
        return new self(
            result: $result,
            success: $result === RedemptionResult::Valid,
            message: $result->message(),
            claim: $claim,
        );
    }

    public function toArray(): array
    {
        return [
            'status' => $this->result->value,
            'success' => $this->success,
            'message' => $this->message,
            'claim' => $this->claim,
        ];
    }
}
