<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->string('type', 32); // ActivityType enum value
            $table->nullableMorphs('subject'); // e.g. Offer, Claim, Screen, Advertiser
            $table->foreignId('screen_id')->nullable()->constrained('screens')->nullOnDelete();
            $table->foreignId('offer_id')->nullable()->constrained('offers')->nullOnDelete();
            $table->foreignId('advertiser_id')->nullable()->constrained('advertisers')->nullOnDelete();
            $table->foreignId('claim_id')->nullable()->constrained('claims')->nullOnDelete();
            $table->json('meta')->nullable(); // arbitrary contextual payload
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('created_at')->nullable();

            $table->index(['type', 'created_at']);
            $table->index(['offer_id', 'type']);
            $table->index(['advertiser_id', 'type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
