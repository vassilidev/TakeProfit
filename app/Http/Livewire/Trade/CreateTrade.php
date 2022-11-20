<?php

namespace App\Http\Livewire\Trade;

use App\Models\Exchange;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreateTrade extends Component
{
    public Exchange $exchange;

    public $percentAmount = 0;
    public $amount = 0;
    public $resalePrice;
    public $resalePercent = 0;

    /**
     * @return void
     */
    public function mount(): void
    {
        $this->resalePrice = $this->exchange->price;
    }

    /**
     * @return string[][]
     */
    public function rules(): array
    {
        return [
            'percentAmount' => [
                'required',
                'numeric',
                'between:0,100',
            ],
            'amount'        => [
                'required',
                'numeric',
                'between:0,' . $this->exchange->amount,
            ],
            'resalePrice'   => [
                'required',
                'numeric',
                'min:' . $this->exchange->price,
            ],
        ];
    }

    /**
     * @param $propertyName
     *
     * @return void
     */
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function createTrade() {}

    /**
     * @return void
     */
    public function updatePercentAmount(): void
    {
        $this->percentAmount = 100 * $this->amount / $this->exchange->amount;
        $this->validateOnly('percentAmount');
    }

    /**
     * @return void
     */
    public function updateAmount(): void
    {
        $this->amount = $this->percentAmount * $this->exchange->amount / 100;
        $this->validateOnly('amount');
    }

    /**
     * @return void
     */
    public function updateResalePercent(): void
    {
        $this->resalePercent = ($this->resalePrice - $this->exchange->price) / $this->exchange->price * 100;
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.trade.create-trade');
    }
}
