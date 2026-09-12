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
        Schema::create('flight_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 150);
            $table->string('email', 150)->index();
            $table->string('phone', 50)->nullable();
            $table->string('trip_type', 30)->default('roundtrip');
            $table->string('traveller_type', 50)->default('personal');
            $table->string('cabin_class', 50)->default('economy');
            $table->string('preferred_airline', 100)->nullable();
            $table->string('dep_city', 150)->nullable();
            $table->string('dest_city', 150)->nullable();
            $table->date('dep_date')->nullable();
            $table->date('return_date')->nullable();
            $table->unsignedSmallInteger('count_adults')->default(1);
            $table->unsignedSmallInteger('count_children')->default(0);
            $table->unsignedSmallInteger('count_infants')->default(0);
            $table->boolean('flex_dates')->default(false);
            $table->json('multicity_legs')->nullable();
            $table->text('special_requests')->nullable();
            $table->string('status', 30)->default('pending')->index();
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight_inquiries');
    }
};
