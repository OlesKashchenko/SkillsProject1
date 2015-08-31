<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplyDepositFormTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apply_deposit_forms', function ($table) {
			$table->increments('id');
			$table->tinyInteger('is_client');
			$table->string('full_name', 100);
			$table->string('phone_number', 14);
            $table->date('created_at');
            $table->date('updated_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('apply_deposit_forms');
	}

}
