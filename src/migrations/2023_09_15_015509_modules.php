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
        // cek jika belum ada table modules maka buat
        if (!Schema::hasTable('modules')) {
            Schema::create('modules', function (Blueprint $table) {
                $table->id();
                $table->string('menu');
                $table->string('table');
                $table->string('controller');
                $table->string('icon')->nullable();
                $table->string('slug')->nullable();
                $table->string('type')->nullable();
                $table->string('title')->nullable();
                $table->string('title_field')->nullable();
                $table->string('limit')->nullable();
                $table->string('orderby')->nullable();
                $table->string('global_privilege')->nullable();
                $table->string('button_table_action')->nullable();
                $table->string('button_bulk_action')->nullable();
                $table->string('button_action_style')->nullable();
                $table->string('button_add')->nullable();
                $table->string('button_edit')->nullable();
                $table->string('button_delete')->nullable();
                $table->string('button_detail')->nullable();
                $table->string('button_show')->nullable();
                $table->string('button_filter')->nullable();
                $table->string('button_import')->nullable();
                $table->string('button_export')->nullable();
                $table->string('paginate')->nullable();
                $table->string('datatable')->nullable();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
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
