<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique(); // used in public /confirmation/{uuid}
            $table->foreignId('offer_id')->constrained('offers')->cascadeOnDelete();
            $table->foreignId('screen_id')->nullable()->constrained('screens')->nullOnDelete();

            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();

            // Coupon artifacts - never rendered to the public frontend directly.
            $table->string('coupon_code', 32)->unique();
            $table->string('qr_code_path')->nullable();

            $table->string('status')->default('claimed'); // ClaimStatus enum
            $table->timestamp('expires_at');
            $table->timestamp('redeemed_at')->nullable();
            $table->string('redeemed_by')->nullable(); // free-text merchant identifier/device

            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();

            $table->timestamps();

            $table->index(['offer_id', 'email']);
            $table->index(['status', 'expires_at']);
            $table->index(['coupon_code', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};
