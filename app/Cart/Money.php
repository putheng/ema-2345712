<?php

namespace App\Cart;

use NumberFormatter;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money as BaseMoney;
use Money\Parser\IntlMoneyParser;

class Money
{
    protected $money;

    public function __construct($value)
    {
        $this->money = $value;
    }

    public function convert($value)
    {
        
    }

    public function amount()
    {
        return $this->money;
    }

    public function totalAmount()
    {
        return $this->money;
    }

    public function formatted()
    {
        if(get_currency()->current() == 'KHR'){
            return number_format($this->money, 2) .'៛';
        }

        return '$'.number_format($this->money, 2);
    }

    public function formattedCart()
    {
        
    }

    public function unformattedCart()
    {

    }

    public function add($added)
    {
        $this->money = ($this->money + $added);

        return $this;
    }

    public function instance()
    {
        
    }

    public function priceformatt()
    {
        $money = new BaseMoney($this->money, new Currency('USD'));

        $formatter = new IntlMoneyFormatter(
            new NumberFormatter('USD', NumberFormatter::CURRENCY),
            new ISOCurrencies()
        );

        return $formatter->format($money);
    }
}