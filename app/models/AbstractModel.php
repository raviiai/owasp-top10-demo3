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
	 * Create a new object from the current class.
	 */
	public static function create(array $data)
	{
		$obj = new static;
		foreach ($data as $key => $value) {
			$obj->$key = $value;
		}

		return $obj;
	}

	/**
	 * Save object to database and set ID.
	 */
	public function save()
	{
		$id = DB::table(static::$table)->insertGetId((array)$this);
		$this->{static::$key} = $id;
	}

	/**
	 * Map a standard class object to the current model.
	 */
	protected static function map($stdObj)
	{
		if ($stdObj === null) {
			return null;
		}

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