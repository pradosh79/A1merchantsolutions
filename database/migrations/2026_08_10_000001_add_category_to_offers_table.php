<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('offers', function (Blueprint $table) {
            // CampaignCategory enum value; drives the public homepage
            // category pills/filter. Nullable so existing rows / API-only
            // offers aren't forced to pick one.
            $table->string('category', 32)->nullable()->after('advertiser_id');
            $table->index('category');
        });
    }

    public function down(): void
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->dropIndex(['category']);
            $table->dropColumn('category');
        });
    }
};
