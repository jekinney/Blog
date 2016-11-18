<?php

namespace App\Helpers;

use Carbon\Carbon;

class Slugs 
{
	public static function make($slugable)
	{
		return str_slug($slugable);
	}

	public static function makeWithTimeStamp($slugable, $timestamp = null)
	{
		return str_slug($slugable.'-'.self::time($timestamp)->toDateTimeString());
	}

	public static function makeWithDate($slugable, $timestamp = null)
	{
		return str_slug($slugable.'-'.self::time($timestamp)->toDateString());
	}

	protected static function time($timestamp = null)
	{
		if(is_null($timestamp)) {
			$timestamp = Carbon::now();
		} else {
			$timestamp = Carbon::parse($timestamp);
		}
		return $timestamp;
	}
}