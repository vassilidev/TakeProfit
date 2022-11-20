<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exchange extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'bought_currency_id',
        'with_currency_id',
        'price',
        'amount',
        'bought_at',
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'bought_at',
    ];

    /**
     * @var string[]
     */
    protected $appends = [
        'full_name',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function boughtCurrency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'bought_currency_id');
    }

    /**
     * @return BelongsTo
     */
    public function withCurrency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'with_currency_id');
    }

    /**
     * @return Attribute
     */
    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn($value) => __('Exchange') . " #{$this->id} | " . $this->created_at->format('Y/m/d')
        );
    }
}
