<?php

namespace App\DTO;

/**
 * Immutable transport object carrying validated claim-form input
 * from the Http layer down into the Service/Repository layers.
 */
final class ClaimData
{
    public function __construct(
        public readonly int $offerId,
        public readonly ?int $screenId,
        public readonly string $name,
        public readonly string $email,
        public readonly ?string $phone,
        public readonly ?string $ipAddress,
        public readonly ?string $userAgent,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            offerId: (int) $data['offer_id'],
            screenId: isset($data['screen_id']) ? (int) $data['screen_id'] : null,
            name: $data['name'],
            email: strtolower(trim($data['email'])),
            phone: $data['phone'] ?? null,
            ipAddress: $data['ip_address'] ?? null,
            userAgent: $data['user_agent'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'offer_id' => $this->offerId,
            'screen_id' => $this->screenId,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ];
    }
}
