<?php

namespace App\Models\Traits;

use App\Cart\Money;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use NumberFormatter;

use App\Models\Product;
use App\Models\ProductVariation;

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
        
    }

    public function getFormattedSalePriceAttribute()
    {
        if(get_currency()->current() == 'KHR'){
            return number_format(($this->tax_price->amount() * 4100), 2) .'៛';
        }

        return '$'.number_format($this->tax_price->amount(), 2);
    }

    public function getFormattedMarketPriceAttribute()
    {
        if(get_currency()->current() == 'KHR'){
            return number_format(($this->market_price->amount() * 4100), 2) .'៛';
        }

        return '$'.number_format($this->market_price->amount(), 2);
    }

    public function getFormattedTaxPriceAttribute()
    {
        if(get_currency()->current() == 'KHR'){
            return number_format(($this->tax_price->amount() * 4100), 2) .'៛';
        }

        return '$'.number_format($this->tax_price->amount(), 2);
    }

    protected function switchCurrency($price)
    {
        
    }
}
