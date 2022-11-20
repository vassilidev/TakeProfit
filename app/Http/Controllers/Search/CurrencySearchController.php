<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Select2SearchController;
use App\Services\Currency\CacheCurrencyService;

class CurrencySearchController extends Select2SearchController
{
    /**
     * @var CacheCurrencyService
     */
    private CacheCurrencyService $cacheCurrencyService;

    /**
     * @param CacheCurrencyService $cacheCurrencyService
     */
    public function __construct(CacheCurrencyService $cacheCurrencyService)
    {
        $this->cacheCurrencyService = $cacheCurrencyService;
    }

    /**
     * @return array
     */
    public function getAllData(): array
    {
        return $this->mapForSelect2(
            data: $this->cacheCurrencyService->getAllSearchData(),
            text: 'full_name'
        );
    }

    /**
     * @return array
     */
    public function getFiatData(): array
    {
        return $this->mapForSelect2(
            data: $this->cacheCurrencyService->getFiatSearchData(),
            text: 'full_name'
        );
    }

    /**
     * @return array
     */
    public function getCryptoData(): array
    {
        return $this->mapForSelect2(
            data: $this->cacheCurrencyService->getCryptoSearchData(),
            text: 'full_name'
        );
    }
}
