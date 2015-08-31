<?php

use Illuminate\Database\Eloquent\Collection;


class Deposit extends Eloquent
{

    protected $table = 'deposits';


	public function tree()
	{
		return $this->hasOne('Tree', 'id', 'id_tb_tree');
	}

    public function scopeFrequency($query, $frequency = 'capitalize')
    {
        return $query->where('frequency_payment', $frequency);
    } // end scopeFrequency

    public function scopeCurrency($query, $currency = 'uah')
    {
        return $query->where('currency', $currency);
    } // end scopeCurrency

    public function scopeAmountFrom($query, $amount = 0)
    {
        if (!$amount) {
            return $query;
        }

        return $query->where('amount_from', '>=', $amount);
    } // end scopeAmountFrom

    public function scopeAmount($query, $amount = 0)
    {
        if (!$amount) {
            return $query;
        }

        return $query->where('amount_from', '<=', $amount);
    } // end scopeAmount

    public function scopeTerms($query, $terms = array())
    {
        if (!$terms) {
            return $query;
        }

        $terms = array_unique($terms);

        return $query->whereIn('term', $terms);
    } // end scopeTerms

    public function scopeWithoutMonthly($query)
    {
        return $query->where('monthly_installment', 0);
    } // end scopeWithoutMonthly

    public function scopeMonthly($query, $amount = 0)
    {
        if (!$amount) {
            return $query;
        }

        return $query->where('monthly_installment', '<=', $amount);
    } // end scopeMonthly

    public static function prepareData(Collection $options)
    {
        $groups = [];

        foreach ($options as $option) {
            $groups[trim($option->id_tb_tree)]
            ['rates']
            [$option->frequency_payment]
            [trim($option->term)]
            [trim($option->currency)] = trim($option->percent);

            $groups[trim($option->id_tb_tree)]['term_type'] = trim($option->term_type);
        }

        return $groups;
    } // end prepareData

    public static function prepareMaxPercents(Collection $deposits)
    {
        $result = array();

        foreach ($deposits as $deposit) {
            if (!isset($result[$deposit->frequency_payment])) {
                $result[$deposit->frequency_payment] = $deposit->percent;
            }

            if ($deposit->percent > $result[$deposit->frequency_payment]) {
                $result[$deposit->frequency_payment] = $deposit->percent;
            }
        }

        foreach ($result as $type => $percent) {
            if (!isset($result['max_percent']) || $percent > $result['max_percent']) {
                $result['max_percent'] = $percent;
                $result['max_percent_type'] = $type;
            }
        }

        return $result;
    } // end prepareMaxPercents
}
