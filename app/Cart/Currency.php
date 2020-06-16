<?php

namespace App\Cart;

class Currency
{
	protected $value;

	public function __construct($value = 'USD')
	{
		$this->value = $value;
	}

	protected function getCurrencySymbol()
	{
		return '$';
	}

	public function original()
	{
		return $this->value;
	}

	public function amount()
	{
		return $this->getCurrencySymbol() . $this->value;

	}
    public function formatted()
    {
        return $this->getCurrencySymbol() . number_format($this->value, 3);
    }

    public function current()
    {
    	if(auth()->check()){
    		return auth()->user()->currency;
    	}

    	if(session()->has('currency')){
    		return session()->get('currency');
    	}

    	return syt_option('default_currency')->cal_value;
    }
}