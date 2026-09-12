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
        Schema::table('packages', function (Blueprint $table) {
            $table->unsignedSmallInteger('duration_days')->nullable()->after('duration');
            $table->unsignedSmallInteger('duration_nights')->nullable()->after('duration_days');
            $table->string('currency', 10)->default('USD')->after('price_from');
            $table->text('short_description')->nullable()->after('overview');
            $table->json('tags')->nullable()->after('short_description');
            $table->date('start_date')->nullable()->after('tags');
            $table->date('end_date')->nullable()->after('start_date');
            $table->json('room_types')->nullable()->after('itinerary');
            $table->json('highlights')->nullable()->after('room_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn([
                'duration_days',
                'duration_nights',
                'currency',
                'short_description',
                'tags',
                'start_date',
                'end_date',
                'room_types',
                'highlights',
            ]);
        });
    }
};
