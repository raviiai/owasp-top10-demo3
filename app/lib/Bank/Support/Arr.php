<?php namespace Bank\Support;

class Arr {

	public static function toMap(array $data, $keyName, $valueName)
	{
		$map = array();
		foreach ($data as $item) {
			if (is_array($item)) {
				$key = $item[$keyName];
				$value = $item[$valueName];
			} else {
				$key = $item->$keyName;
				$value = $item->$valueName;
			}

			$map[$key] = $value;
		}

		return $map;
	}

}