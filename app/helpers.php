<?php

use Money\Money;
use Money\Currency as BaseCurrency;
use App\Models\Option;
use App\Cart\Currency;
use Money\Parser\IntlMoneyParser;
use Money\Currencies\ISOCurrencies;
use Money\Formatter\DecimalMoneyFormatter;

use Illuminate\Support\Facades\Cache;

if(!function_exists('syt_option')){
	function syt_option($type = null)
	{
		if($type !== null){
			// $value = Cache::get($type, function () use ($type) {
			// 	return Option::where('type', $type)->first();
			// });

			return optional(Option::where('type', $type))->first();
		}

		return new Option;
	}
}

if(!function_exists('get_level')){
	function get_level($level)
	{
		return syt_option('level_'. $level);
	}
}

if(!function_exists('get_currency')){
	function get_currency($value = 'USD')
	{
		return new Currency($value);
	}
}

if(!function_exists('currency_convert')){
	function currency_convert($value)
    {
        $moneyParser = new IntlMoneyParser(
            new \NumberFormatter('en_US', \NumberFormatter::CURRENCY),
            new ISOCurrencies()
        );

        return $moneyParser->parse('$'. $value);
    }
}

if(!function_exists('currency_format')){
	function currency_format($value, $currency = 'USD'){
		return $value;
	}
}