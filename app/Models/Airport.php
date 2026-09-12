<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'airports';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'iata_code',
        'name',
        'city',
        'country',
    ];

    /**
     * Scope a query to search airports by code, city, name, or country.
     */
    public function scopeSearch(Builder $query, string $term): Builder
    {
        return $query->where('iata_code', 'LIKE', "{$term}%")
            ->orWhere('city', 'LIKE', "{$term}%")
            ->orWhere('name', 'LIKE', "%{$term}%")
            ->orWhere('country', 'LIKE', "%{$term}%");
    }
}
