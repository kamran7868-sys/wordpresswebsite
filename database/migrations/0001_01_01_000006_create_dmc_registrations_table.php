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
        Schema::create('dmc_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 200);
            $table->string('contact_person', 150);
            $table->string('email', 150)->index();
            $table->string('phone', 50);
            $table->string('country', 100)->index();
            $table->unsignedSmallInteger('years_in_operation');
            $table->string('website', 255)->nullable();
            $table->json('services');
            $table->text('details')->nullable();
            $table->string('status', 30)->default('pending_review')->index();
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dmc_registrations');
    }
};
