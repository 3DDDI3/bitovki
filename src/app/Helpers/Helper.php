<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class Helper
{
    public static function phone($val) {
        if (empty($val)) return;

        $val = trim(explode(',', $val)[0]);

		$val = str_replace(" ", "", $val);
		$val = str_replace("(", "", $val);
		$val = str_replace(")", "", $val);
		$val = str_replace("-", "", $val);

		return $val;
    }

    public static function empty($val) {
        $val = !empty($val) ? $val : '';
        return $val;
    }

    public static function price_format($val) {
        $val = number_format($val, 0, '', ' ');
        return $val;
    }

    public static function clear($name) {
    	$name = strip_tags($name);
    	$name = str_replace('\n', ' ', $name);
    	$name = str_replace('  ', ' ', $name);
    	return $name;
    }

    public static function formatBytes($size, $precision = 2, $russian = false)
    {
        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes =  $russian ? [' байтов', ' КБ', ' МБ', ' ГБ', ' ТБ'] : array(' bytes', ' KB', ' MB', ' GB', ' TB');

            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        } else {
            return $size;
        }
    }

    public static function decl($number, $titles) {
		$cases = array (2, 0, 1, 1, 1, 2);
		return $titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];
	}

    public static function hash() {
		$hash = md5(uniqid(rand(), true));
		return $hash;
	}

    public static function personal($name, $user) {
        $value = Cookie::get('order_personal_'.$name);
        if (empty($value) && !empty($user)) $value = @$user->{$name} ?? '';
        return $value;
	}

    public static function validatePhoneNumber($phone_number)
    {
        return preg_match("/^\\+?\\d{1,4}?[-.\\s]?\\(?\\d{1,3}?\\)?[-.\\s]?\\d{1,4}[-.\\s]?\\d{1,4}[-.\\s]?\\d{1,9}$/", $phone_number);
    }
}
