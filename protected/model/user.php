<?php
class LHModelUser extends LHModel
{
	public $id;
	public $name;

	protected function tableName()
	{
		return 'user';
	}

}