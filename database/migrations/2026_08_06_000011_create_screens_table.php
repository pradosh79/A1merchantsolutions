<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('screens', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            // Public, short, URL-friendly identifier used in /s/{screen_id}
            $table->string('code', 32)->unique();
            $table->string('name');
            $table->string('location')->nullable();
            $table->string('status')->default('active'); // ScreenStatus enum
            $table->json('meta')->nullable();
            $table->timestamp('last_ping_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('screens');
    }
};
