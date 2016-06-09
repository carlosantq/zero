<?php 
namespace B7KP\Utils;

class Functions
{
	static function correctDate($date, $format)
	{
		$date = str_replace("/", "-", $date);
		$date = new \DateTime($date);
		$date = $date->format($format);
		return $date;
	}

	static function formatNum($num){
		$num = intval($num);
		$num = $num === 0 ? "=" : sprintf("%+d", $num);
	    return $num;
	}

	public function fixLFM($name)
	{
		$name = str_replace("+", "%252b", $name);
		$name = str_replace(" ", "+", $name);
		//var_dump($name);
		return ($name);
	}

	static function removeEmpty($array)
	{
		$final = array();
		foreach ($array as $value) 
		{
			if($value != "")
			{
				$final[] = $value;
			}
		}
		return $final;
	}

	static function extractNumber($str)
	{
		return preg_replace("/[^0-9]/","",$str);
	}

	static function getStringBetween($str, $start, $end)
	{
	    $contents = array();
		$startLength = strlen($start);
		$endLength = strlen($end);
		$startFrom = $contentStart = $contentEnd = 0;
		while (false !== ($contentStart = strpos($str, $start, $startFrom))) 
		{
			$contentStart += $startLength;
		    $contentEnd = strpos($str, $end, $contentStart);
		    if (false === $contentEnd) 
		    {
		        break;
		    }
		    $contents[] = substr($str, $contentStart, $contentEnd - $contentStart);
		    $startFrom = $contentEnd + $endLength;
		}

	    return $contents;
	}

	static function hasStringKeys(array $array) 
	{
	  	return count(array_filter(array_keys($array), 'is_string')) > 0;
	}

	static function convertStringToNumeric($str)
	{
		$num = false;
		if(is_numeric($str)) 
		{ 
			$num = $str + 0; 
		} 
		return $num; 
	}

	static function isJson($string) 
	{
	 	json_decode($string);
	 	return (json_last_error() == JSON_ERROR_NONE);
	}

	static function arrayMaker($val)
	{
		if(!is_array($val))
		{
			return (array) $val;
		}
		return $val;
	}
}
?>