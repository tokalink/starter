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
        // cek table forms jika belum ada maka buat
        if (!Schema::hasTable('forms')) {
            Schema::create('forms', function (Blueprint $table) {
                $table->id();
                $table->integer('module_id');
                $table->string('type');
                $table->string('label');
                $table->string('name');
                $table->string('placeholder')->nullable();
                $table->string('class')->nullable();
                $table->string('value')->nullable();
                $table->string('required')->nullable();
                $table->string('readonly')->nullable();
                $table->string('disabled')->nullable();
                $table->string('multiple')->nullable();
                $table->string('accept')->nullable();
                $table->string('rows')->nullable();
                $table->string('cols')->nullable();
                $table->string('min')->nullable();
                $table->string('max')->nullable();
                $table->string('step')->nullable();
                $table->string('minlength')->nullable();
                $table->string('maxlength')->nullable();
                $table->timestamps();
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
