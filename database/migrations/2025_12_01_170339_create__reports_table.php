<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->json('filters')->nullable();       // stored filter payload (q, department, position, status)
            $table->string('file_path')->nullable();   // exported file path, if any
            $table->string('file_type')->default('csv');
            $table->unsignedInteger('record_count')->default(0);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamp('generated_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->enum('status', ['pending','ready','failed'])->default('pending');
            $table->timestamps();

            $table->index(['user_id','status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
