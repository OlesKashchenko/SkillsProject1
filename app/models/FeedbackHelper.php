<?php

class FeedbackHelper extends Eloquent
{

    use TranslateTrait,
        \Yaro\Jarboe\Helpers\Traits\ImageTrait;


    protected $table = 'feedback_sms_helpers';


    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    } // end scopeActive
}
