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
        if (!Schema::hasTable('modules')) {
            Schema::create('modules', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('controller')->default('CustomController');
                $table->string('metod')->default('costum');
                $table->text('col')->default(null);
                $table->text('forms')->default(null);
                $table->string('icon')->nullable();
                $table->string('slug')->nullable();
                $table->integer('order')->nullable();
                $table->boolean('is_active')->default(true);
                $table->boolean('is_menu')->default(true);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module');
    }
};
