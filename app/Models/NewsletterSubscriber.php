<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Deliberately kept simple (no Repository/Service layer): a single-table,
 * single-operation capture (email + source) with no business rules beyond
 * "don't duplicate." If this grows (double opt-in, unsubscribe links,
 * campaign sends), promote it to the same Repository+Service pattern as
 * the rest of the app.
 */
class NewsletterSubscriber extends Model
{
    protected $fillable = ['email', 'source', 'ip_address', 'unsubscribed_at'];

    protected function casts(): array
    {
        return [
            'unsubscribed_at' => 'datetime',
        ];
    }
}
