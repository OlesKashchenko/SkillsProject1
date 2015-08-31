<?php


class FeedbackCategory extends Eloquent
{

	use TranslateTrait,
		\Yaro\Jarboe\Helpers\Traits\ImageTrait;


	protected $table = 'feedback_categories';


	public function scopeActive($query)
	{
		return $query->where('is_active', 1);
	} // end scopeActive
}
