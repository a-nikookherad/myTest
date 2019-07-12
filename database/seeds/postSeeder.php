<?php

use App\post;
use Illuminate\Database\Seeder;

class postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		post::truncate();
		factory(post::class,10)->create();

    }
}
