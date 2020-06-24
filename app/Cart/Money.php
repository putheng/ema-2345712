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
        $value = (int) $value;
        
        $this->money = new BaseMoney($value, new Currency('USD'));
    }

    public function convert($value)
    {
        $moneyParser = new IntlMoneyParser(
            new \NumberFormatter('en_US', \NumberFormatter::CURRENCY),
            new ISOCurrencies()
        );

        return $moneyParser->parse($value);
    }

    public function amount()
    {
        return $this->money->getAmount();
    }

    public function formatted()
    {
        $formatter = new IntlMoneyFormatter(
            new NumberFormatter('USD', NumberFormatter::CURRENCY),
            new ISOCurrencies()
        );

        return $formatter->format($this->money);
    }

    public function formattedCart()
    {
        if(get_currency()->current() == 'KHR'){
            $price = currency_format($this->amount());

            return number_format($price * syt_option('c_usd_rate')->cal_value, 2) .'៛';
        }


        $formatter = new IntlMoneyFormatter(
            new NumberFormatter('USD', NumberFormatter::CURRENCY),
            new ISOCurrencies()
        );

        return $formatter->format($this->money);
    }

    public function unformattedCart()
    {
        if(get_currency()->current() == 'KHR'){
            $price = currency_format($this->amount());

            return $price * syt_option('c_usd_rate')->cal_value;
        }


        $formatter = new IntlMoneyFormatter(
            new NumberFormatter('USD', NumberFormatter::CURRENCY),
            new ISOCurrencies()
        );

        return currency_format($this->amount());
    }

    public function add(Money $money)
    {
        $this->money = $this->money->add($money->instance());

        return $this;
    }

    public function instance()
    {
        return $this->money;
    }
}