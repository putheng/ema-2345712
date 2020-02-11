<?php

use App\Models\Option;

if(!function_exists('syt_option')){
	function syt_option($type = null)
	{
		if($type !== null){
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