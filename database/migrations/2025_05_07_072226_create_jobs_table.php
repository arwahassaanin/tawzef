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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ar');
            $table->text('description_en');
            $table->text('description_ar');
            $table->string('job_type');
            $table->decimal('salary',10,2);
            $table->foreignId('company_id')->constrained('users')->cascadeOnDelete();
            $table->string('location_en');
            $table->string('location_ar');
            $table->date('application_deadline');
            $table->timestamp('posted_at');
            $table->enum('status',['open','closed'])->default('closed');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
