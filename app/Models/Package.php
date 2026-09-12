<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';

    protected $fillable = [
        'slug',
        'title',
        'tagline',
        'category',
        'region',
        'country',
        'duration',
        'duration_days',
        'duration_nights',
        'price_from',
        'currency',
        'featured_image',
        'gallery',
        'overview',
        'short_description',
        'tags',
        'start_date',
        'end_date',
        'features',
        'itinerary',
        'room_types',
        'highlights',
        'inclusions',
        'exclusions',
        'is_featured',
        'status',
    ];

    protected $casts = [
        'gallery' => 'array',
        'features' => 'array',
        'itinerary' => 'array',
        'room_types' => 'array',
        'highlights' => 'array',
        'inclusions' => 'array',
        'exclusions' => 'array',
        'tags' => 'array',
        'is_featured' => 'boolean',
        'price_from' => 'decimal:2',
        'duration_days' => 'integer',
        'duration_nights' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    protected static function booted(): void
    {
        static::saving(function (Package $package) {
            if (empty($package->country)) {
                $package->country = 'Global';
            }
            if (!empty($package->duration_days) && empty($package->duration)) {
                $nights = $package->duration_nights ?? max(0, $package->duration_days - 1);
                $package->duration = "{$package->duration_days} Days / {$nights} Nights";
            }
            if (empty($package->overview) && !empty($package->short_description)) {
                $package->overview = $package->short_description;
            } elseif (empty($package->short_description) && !empty($package->overview)) {
                $package->short_description = $package->overview;
            }
        });
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    public function scopeCategory(Builder $query, string $category): Builder
    {
        return $query->where('category', $category);
    }

    public function scopeRegion(Builder $query, string $region): Builder
    {
        return $query->where('region', $region);
    }
}
