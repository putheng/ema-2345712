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

    public function getTaxPriceAttribute($value)
    {
        return new Money($value);
    }

    public function getFormattedPriceAttribute()
    {
        return $this->price->formatted();
    }

    public function getFormattedTaxPriceAttribute()
    {
        if($this->tax_price->amount() != 0){
            return $this->tax_price->formatted();
        }

        return $this->sale_price->formatted();
    }
}
