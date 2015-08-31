<?php

class FeedbackForm extends Eloquent
{

    use TranslateTrait,
        \Yaro\Jarboe\Helpers\Traits\ImageTrait;


    protected $table = 'feedback_forms';
    protected $fillable = array(
        'id_theme',
        'is_bank_client',
        'is_active',
        'full_name',
        'last_name',
        'first_name',
        'patronymic_name',
        'phone_number',
        'email',
        'question',
        'question_ru',
        'question_en',
        'answer',
        'answer_ru',
        'answer_en',
    );


    public function category()
    {
        return $this->hasOne('FeedbackCategory', 'id', 'id_category');
    } // end category

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    } // end scopeActive
}
