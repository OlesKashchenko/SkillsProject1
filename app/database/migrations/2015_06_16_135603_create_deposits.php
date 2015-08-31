<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeposits extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('deposits', function ($table) {
			$table->increments('id');
			$table->integer('id_tb_tree')->unsigned();
			$table->foreign('id_tb_tree')
				->references('id')->on('tb_tree')
				->onDelete('cascade');
			$table->enum('frequency_payment', array('endofterm', 'monthly', 'capitalizing'));
			$table->enum('currency', array('uah', 'usd', 'eur'));
			$table->integer('term')->unsigned();
			$table->integer('percent')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('deposits');
	}

}
