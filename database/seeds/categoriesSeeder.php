<?php

use App\category;
use Illuminate\Database\Seeder;

class categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		category::truncate();
		factory(category::class,5)->create();
    }
}
