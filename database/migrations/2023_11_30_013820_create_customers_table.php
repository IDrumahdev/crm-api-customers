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
        Schema::create('customers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->date('birth_day');
            $table->string('place_birth');
            $table->string('email')->unique();
            $table->string('mobilephone',14)->unique();
            $table->text('address');
            $table->string('city');
            $table->string('country')->default('Indonesia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
