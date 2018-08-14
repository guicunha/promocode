<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateVoucherLogsTable.
 */
class CreateVoucherLogsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('voucher_logs', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('used_email');
            $table->string('promo_code');
            $table->string('short_message');
            $table->text('message');
            $table->string('ip_address');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('voucher_logs');
	}
}
