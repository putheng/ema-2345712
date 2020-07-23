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
        if(get_currency()->current() == 'KHR' && $this->currency == 'USD'){
            $value = (int) ($value * syt_option('c_usd_rate')->cal_value);
        }

        if(get_currency()->current() == 'USD' && $this->currency == 'KHR'){
            $value = (int) ($value / syt_option('c_usd_rate')->cal_value);
        }

        return new Money($value);
    }

    public function getFormattedPriceAttribute()
    {
        if($this->price->amount() == 0){
            return false;
        }

        if($this->currency != get_currency()->current()){
            return $this->switchCurrency($this->price);
        }else{
            if($this->currency == 'KHR'){
                return currency_format($this->price->amount(), 'KHR').'៛';
            }else{
                return $this->price->formatted();
            }
        }
    }

    public function getFormattedSalePriceAttribute()
    {
        if($this->sale_price->amount() == 0){
            return false;
        }

        if($this->currency != get_currency()->current()){
            return $this->switchCurrency($this->sale_price);
        }else{
            if($this->currency == 'KHR'){
                return currency_format($this->sale_price->amount(), 'KHR').'៛';
            }else{
                return $this->sale_price->formatted();
            }
        }
    }

    public function getFormattedMarketPriceAttribute()
    {
        if($this->market_price->amount() == 0){
            return false;
        }

        if($this->currency != get_currency()->current()){
            return $this->switchCurrency($this->market_price);
        }else{
            if($this->currency == 'KHR'){
                return currency_format($this->market_price->amount(), 'KHR').'៛';
            }else{
                return $this->market_price->formatted();
            }
        }
    }

    public function getFormattedTaxPriceAttribute()
    {
        if($this->tax_price->amount() != 0){
            return $this->tax_price->formatted();
        }

        return $this->sale_price->amount();
    }

    protected function switchCurrency($price)
    {
        if($this->currency == 'USD' && get_currency()->current() == 'KHR'){
            $price = currency_format($price->amount());

            return number_format($price * syt_option('c_usd_rate')->cal_value, 2) .'៛';
        }

        if($this->currency == 'KHR' && get_currency()->current() == 'USD'){
            $price = currency_format($price->amount());

            $number = number_format($price / syt_option('c_usd_rate')->cal_value, 2);

            if($number < 1){
                $number = number_format($price / syt_option('c_usd_rate')->cal_value, 3);
                if($number < 1){
                    $number = number_format($price / syt_option('c_usd_rate')->cal_value, 4);
                }
            }

            return $number .'$';
        }
    }
}
