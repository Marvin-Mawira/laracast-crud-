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
            if (!Schema::hasTable('job_listings')) {
                Schema::create('job_listings', function (Blueprint $table) {
                    $table->id();
                    $table->string('title'); // Add the title column
                    $table->string('salary'); // Add the salary column
                    $table->timestamps();
                });
            }
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
