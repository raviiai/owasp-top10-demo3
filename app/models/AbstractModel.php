<?php

abstract class AbstractModel {
	protected static $key = 'id';

	/**
	 * Return a model object based on the table's primary key.
	 */
	public static function findById($id)
	{
		return static::map(DB::table(static::$table)->where(static::$key, $id)->first());
	}

	/**
	 * Map a standard class object to the current model.
	 */
	protected static function map($stdObj)
	{
		if (is_array($stdObj)) {
			$list = array();
			foreach ($stdObj as $item) {
				$list[] = static::map($item);
			}
			return $list;
		}

		$mappedObject = new static;
		foreach ($stdObj as $name => $value) {
			$mappedObject->$name = $value;
		}
		return $mappedObject;
	}

}