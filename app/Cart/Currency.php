<?php

namespace App\Cart;

class Currency
{
	protected $value;

	public function __construct($value)
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
}