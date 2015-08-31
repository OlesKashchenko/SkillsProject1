<?php

class ApplyFormFactory
{

	public static function create($type)
	{
		if (!$type) {
			throw new Exception('Apply form type is not defined!');
		}

		$applyForm = null;
		switch ($type) {
			case 'refinance':
				$applyForm = new ApplyFormPrivatesRefinance();
				break;

			case 'consumer':
				$applyForm = new ApplyFormPrivatesConsumer();
				break;

			case 'cash':
				$applyForm = new ApplyFormPrivatesCash();
				break;

			case 'deposit':
				$applyForm = new ApplyFormPrivatesDeposit();
				break;

			case 'sb_rate':
				$applyForm = new ApplyFormSmallBusinessRate();
				break;

			case 'sb_remote':
				$applyForm = new ApplyFormSmallBusinessRemote();
				break;

			case 'sb_salary':
				$applyForm = new ApplyFormSmallBusinessSalary();
				break;

			case 'sb_inet_equiring':
				$applyForm = new ApplyFormSmallBusinessEquiring();
				break;

			case 'sb_lizing':
				$applyForm = new ApplyFormSmallBusinessLizing();
				break;

			case 'sb_deposit':
				$applyForm = new ApplyFormSmallBusinessDeposit();
				break;

			default:
				throw new Exception('Apply form type is not defined!');
		}

		return $applyForm;
	} // end create
}
