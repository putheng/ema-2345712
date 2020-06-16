<?php

namespace App\Models\Traits;

use App\Cart\Money;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use NumberFormatter;

trait HasPrice
{
    public function getPriceAttribute($value)
    {
        return new Money($value);
    }

    public function getSalePriceAttribute($value)
    {
        return new Money($value);
    }

    public function getMarketPriceAttribute($value)
    {
        return new Money($value);
    }

    public function getTaxPriceAttribute($value)
    {
        return new Money($value);
    }

    public function getFormattedPriceAttribute()
    {
        if($this->currency == 'KHR'){
            return 'KHR ' .currency_format($this->price->amount(), 'KHR');
        }
        
        return $this->price->formatted();
    }

    public function getFormattedMarketPriceAttribute()
    {
        if($this->market_price->amount() == 0){
            return false;
        }

        if($this->currency == 'KHR'){
            return 'KHR ' .currency_format($this->market_price->amount(), 'KHR');
        }

        return $this->market_price->formatted();
    }

    public function getFormattedTaxPriceAttribute()
    {
        if($this->tax_price->amount() != 0){
            
            if($this->currency == 'KHR'){
                return 'KHR ' .currency_format($this->tax_price->amount(), 'KHR');
            }

            return $this->tax_price->formatted();
        }

        return $this->sale_price->amount();
    }
}
