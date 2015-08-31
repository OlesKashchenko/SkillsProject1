<?php


class Rates extends Eloquent
{

	protected $table = 'rates';

	public function scopeOrderPriority($query)
	{
		return $query->orderBy('priority', 'asc');
	} // end scopeOrderPriority

}