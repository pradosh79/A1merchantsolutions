<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('advertiser_id')->constrained('advertisers')->cascadeOnDelete();
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->text('terms')->nullable();
            $table->string('image_path')->nullable();
            $table->string('status')->default('draft'); // OfferStatus enum
            $table->unsignedInteger('max_claims')->nullable(); // null = unlimited
            $table->unsignedInteger('claims_count')->default(0); // denormalized counter
            $table->unsignedInteger('redemptions_count')->default(0); // denormalized counter
            $table->dateTime('starts_at')->nullable();
            $table->dateTime('ends_at')->nullable();
            $table->unsignedInteger('coupon_expiry_days')->nullable(); // overrides config default
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['advertiser_id', 'slug']);
            $table->index(['status', 'starts_at', 'ends_at']);
        });

        // Pivot: which screens an offer is displayed on (many-to-many)
        Schema::create('offer_screen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('offer_id')->constrained('offers')->cascadeOnDelete();
            $table->foreignId('screen_id')->constrained('screens')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['offer_id', 'screen_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offer_screen');
        Schema::dropIfExists('offers');
    }
};
