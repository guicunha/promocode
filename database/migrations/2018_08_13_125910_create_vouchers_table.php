<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateVouchersTable.
 */
class CreateVouchersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vouchers', function(Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('promo_code')->unique();
            $table->string('recipient_email');
            $table->integer('offer_id');
            $table->string('offer_name');
            $table->integer('expiration');
            $table->integer('used_date')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['recipient_email', 'promo_code']);
            $table->unique(['recipient_email', 'offer_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vouchers');
	}
}
