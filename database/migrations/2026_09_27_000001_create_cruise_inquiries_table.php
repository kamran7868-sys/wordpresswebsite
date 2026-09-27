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
        Schema::create('cruise_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 150);
            $table->string('email', 150)->index();
            $table->string('phone', 50);
            $table->string('departure_port', 150)->nullable();
            $table->string('cruise_region', 150)->index();
            $table->string('cruise_line', 150)->nullable();
            $table->string('voyage_name', 255)->nullable();
            $table->string('cruise_length', 100)->nullable();
            $table->string('sail_month', 50);
            $table->string('cabin_type', 100);
            $table->boolean('flexible_dates')->default(true);
            $table->string('traveller_type', 50)->default('1adult');
            $table->integer('count_adults')->default(1);
            $table->integer('count_children')->default(0);
            $table->integer('count_infants')->default(0);
            $table->string('special_occasion', 100)->nullable();
            $table->string('preferred_airline', 150)->nullable();
            $table->text('special_requests')->nullable();
            $table->text('admin_reply')->nullable();
            $table->timestamp('replied_at')->nullable();
            $table->string('status', 30)->default('unread')->index();
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cruise_inquiries');
    }
};
