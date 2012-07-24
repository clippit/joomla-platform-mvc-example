<?php
class LHModelUser extends JModelDatabase
{
	/**
	 * Instance for querying
	 * @var LHModelUser
	 */
	private static $_model;

	/**
	 * Properties of this model, same as the columns in related table
	 * @var array
	 */
	private static $_properties = array('id', 'name');

	/**
	 * When get a non-existed property, it won't cause an error
	 * @param  string $token
	 * @return string        value or null
	 */
	public function __get($token)
	{
		if (in_array($token, self::$_properties))
		{
			return null;
		}
	}

	/**
	 * Get Instance for use
	 * @return LHModelUser
	 */
	public static function getInstance()
	{
		if (self::$_model === null)
		{
			self::$_model = new LHModelUser;
		}
		return self::$_model;
	}

	/**
	 * Find all records
	 * @return array All results
	 */
	public static function findAll()
	{
		$db = self::getInstance()->db;
		$q = $db->getQuery(true);
		$q->select('*')->from($q->qn('#__user'));
		$db->setQuery($q);
		return $db->loadObjectList('', 'LHModelUser');
	}

	/**
	 * Find one record according to a simple condition
	 * @param  array $condition  The format should be like array('id'=>1, 'name'=>'xxx')
	 * @return LHModelUser       Result model or null
	 */
	public static function find($condition)
	{
		if (!is_array($condition))
			return null;
		$db = self::getInstance()->db;
		$q = $db->getQuery(true);
		$q->select('*')->from($q->qn('#__user'));
		foreach (self::$_properties as $property) {
			if (array_key_exists($property, $condition) && !empty($condition[$property]))
			{
				$q->where($q->qn($property) . ' = ' . $q->q($condition[$property]));
			}
		}
		$db->setQuery($q);
		return $db->loadObject('LHModelUser');
	}
}