<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('promo_code')->unique(true);
            $table->integer('offer_id');
            $table->string('offer_name');
            $table->string('recipient_name');
            $table->string('email');
            $table->integer('expiration')->default(0);
            $table->integer('used_date')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['email', 'promo_code']);
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
