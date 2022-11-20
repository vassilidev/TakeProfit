<?php

namespace App\Http\Requests;

use App\Services\Currency\CacheCurrencyService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ExchangeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(CacheCurrencyService $cacheCurrencyService): array
    {
        return [
            'bought_currency_id' => [
                'required',
                'int',
                Rule::in($cacheCurrencyService->getCryptoSearchQuery()->pluck('id')),
            ],
            'with_currency_id'   => [
                'required',
                'int',
                Rule::in($cacheCurrencyService->getAllSearchQuery()->pluck('id')),
            ],
            'amount'             => [
                'required',
                'numeric',
            ],
            'price'              => [
                'required',
                'numeric',
            ],
            'bought_at'          => [
                'sometimes',
                'date',
                'before_or_equal:now',
            ],
        ];
    }
}
