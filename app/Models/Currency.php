<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Currency extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'symbol',
        'type',
    ];

    /**
     * @var array
     */
    protected $appends = [
        'full_name',
    ];

    /**
     * @return HasMany
     */
    public function values(): HasMany
    {
        return $this->hasMany(Values::class);
    }

    /**
     * @return HasMany
     */
    public function boughtExchanges(): HasMany
    {
        return $this->hasMany(Exchange::class, 'bought_currency_id');
    }

    /**
     * @return HasMany
     */
    public function withExchanges(): HasMany
    {
        return $this->hasMany(Exchange::class, 'with_currency_id');
    }

    /**
     * @param Builder $query
     * @param string  $type
     *
     * @return Builder
     */
    public function scopeType(Builder $query, string $type = 'fiat'): Builder
    {
        return $query->whereType($type);
    }

    /**
     * @return Attribute
     */
    public function fullName(): Attribute
    {
        return Attribute::make(
            get: static fn($value, $attributes) => "{$attributes['symbol']} ({$attributes['name']})",
        );
    }
}
