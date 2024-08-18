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
        Schema::create('users_camps', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable();
            $table->bigInteger('user_password');
            $table->string('phone_number');
            $table->integer('number_guests')->nullable();
            $table->string('city');
            $table->date('entry_date');
            $table->date('end_date');
            $table->foreignId('camp_id')->constrained();
            $table->foreignId('rooms_id')->constrained()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_camps');
    }
};
