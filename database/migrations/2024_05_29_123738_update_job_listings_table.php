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
        Schema::table('job_listings', function (Blueprint $table) {
            if (!Schema::hasColumn('job_listings', 'title')) {
                $table->string('title');
            }
            if (!Schema::hasColumn('job_listings', 'salary')) {
                $table->integer('salary');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_listings', function (Blueprint $table) {
            if (Schema::hasColumn('job_listings', 'title')) {
                $table->dropColumn('title');
            }
            if (Schema::hasColumn('job_listings', 'salary')) {
                $table->dropColumn('salary');
            }
        });
    }
};