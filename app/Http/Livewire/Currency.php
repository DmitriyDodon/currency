<?php

namespace App\Http\Livewire;


use Illuminate\Support\Facades\Http;


use Livewire\Component;

class Currency extends Component
{
    public $result = 0;
    public $resultCurrency = 0;
    public $inserted = 0;

    protected $rules = [
        'result' => 'numeric',
        'inserted' => 'numeric',
        'resultCurrency' => 'numeric'
    ];

    public function updated($propertyName)
    {
        $this->result = 0;
        $this->validateOnly($propertyName);
        if (is_numeric($this->inserted)) {
            $this->result = round(($this->resultCurrency * $this->inserted), 2);
        }
    }


    public function render()
    {
        $currencies = collect(Http::get('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json')->json());
        return view('livewire.currency', compact('currencies'));
    }
}
