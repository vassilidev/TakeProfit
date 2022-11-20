<?php

namespace App\Services\Currency;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;

class CacheCurrencyService
{
    /**
     * @var array|string[]
     */
    public array $fields = ['id', 'name', 'symbol'];

    /**
     * @return Builder|Currency
     */
    public function getAllSearchQuery(): Builder|Currency
    {
        return Currency::select($this->fields);
    }

    /**
     * @return array
     */
    public function getAllSearchData(): array
    {
        return Cache::remember(
            'search.currency.getAllSearchData',
            60 * 60,
            fn() => $this->getAllSearchQuery()->get()->toArray()
        );
    }

    /**
     * @return Builder|Currency
     */
    public function getFiatSearchQuery(): Builder|Currency
    {
        return Currency::select($this->fields)->type();
    }

    /**
     * @return array
     */
    public function getFiatSearchData(): array
    {
        return Cache::remember(
            'search.currency.getFiatData',
            60 * 60,
            fn() => $this->getFiatSearchQuery()->get()->toArray()
        );
    }

    /**
     * @return Builder|Currency
     */
    public function getCryptoSearchQuery(): Builder|Currency
    {
        return Currency::select($this->fields)->type('crypto');
    }

    /**
     * @return array
     */
    public function getCryptoSearchData(): array
    {
        return Cache::remember(
            'search.currency.getCryptoData',
            60 * 60,
            fn() => $this->getCryptoSearchQuery()->get()->toArray()
        );
    }
}