<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('advertisers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('contact_email');
            $table->string('contact_phone')->nullable();
            $table->string('logo_path')->nullable();
            $table->text('address')->nullable();
            $table->string('status')->default('active'); // AdvertiserStatus enum
            // Secure, unguessable token used in /r/{advertiser_token} merchant redemption page.
            $table->string('redemption_token', 64)->unique();
            $table->timestamp('redemption_token_rotated_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('advertisers');
    }
};
