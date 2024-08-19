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
        Schema::create('flats', function (Blueprint $table) {
            $table->id();
            $table->string('flat_no', 255)->default(''); // 'flat_no' varchar(255) with default empty string
            $table->string('floor', 255)->default(''); // 'floor' varchar(255) with default empty string
            $table->string('block', 255)->default(''); // 'block' varchar(255) with default empty string
            $table->string('updated_by', 255)->default(''); // 'updated_by' varchar(255) with default empty string
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flats');
    }
};
