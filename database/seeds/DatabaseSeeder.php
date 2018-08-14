<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\Offer::class, 10)->create();
        factory(App\Entities\Recipient::class, 150)->create();
        factory(App\Entities\Voucher::class, 1500)->create();
    }
}
