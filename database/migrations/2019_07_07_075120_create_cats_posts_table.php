<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatsPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_posts_rel', function (Blueprint $table) {
            //
			$table->bigIncrements('id');
			$table->bigInteger("cat_id")->unsigned();
//			$table->foreign("cat_id")->references("id")->on("categories")->onDelete();
			$table->bigInteger("post_id")->unsigned();
//			$table->foreign("post_id")->references("id")->on("posts")->onDelete();
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
        Schema::table('categories_posts_rel', function (Blueprint $table) {
            //
        });
    }
}
