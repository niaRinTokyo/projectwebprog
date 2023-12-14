<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->string('slug', 255)->nullable()->after('model');
            $table->string('preview', 255)->nullable()->after('model');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            if (Schema::hasColumn('cars', 'slug')) {
                $table->dropColumn('slug');
            }

            if (Schema::hasColumn('cars', 'preview')) {
                $table->dropColumn('preview');
            }
        });
    }
};
