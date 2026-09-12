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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 150)->unique();
            $table->string('title', 200);
            $table->string('tagline', 255)->nullable();
            $table->string('category', 50)->index(); // 'holiday', 'cruise', 'hotel'
            $table->string('region', 100)->nullable()->index(); // 'north-america', 'south-asia', 'middle-east', 'southeast-asia'
            $table->string('country', 100)->index();
            $table->string('duration', 80)->nullable(); // e.g. '8 Days / 7 Nights'
            $table->decimal('price_from', 10, 2)->nullable();
            $table->string('featured_image', 500);
            $table->json('gallery')->nullable();
            $table->text('overview')->nullable();
            $table->json('features')->nullable();
            $table->json('itinerary')->nullable();
            $table->json('inclusions')->nullable();
            $table->json('exclusions')->nullable();
            $table->boolean('is_featured')->default(false)->index();
            $table->string('status', 30)->default('published')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
