<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * One row per CampaignCategory enum value, holding an admin-uploaded
     * icon image. A missing row (or null icon_path) simply falls back to
     * the enum's built-in Bootstrap Icon class - see
     * HomepageContentService::categoriesWithIcons().
     */
    public function up(): void
    {
        Schema::create('category_icons', function (Blueprint $table) {
            $table->id();
            $table->string('category')->unique(); // CampaignCategory enum value
            $table->string('icon_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('category_icons');
    }
};
