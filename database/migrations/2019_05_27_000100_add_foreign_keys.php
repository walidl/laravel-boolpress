<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('category_post', function (Blueprint $table) {

        $table->foreign('post_id','post')
              ->references('id')
              ->on('posts')
              ->onDelete('cascade');

        $table->foreign('category_id','category')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

      });

      Schema::table('posts', function (Blueprint $table) {

        $table->foreign('user_id','user')
              ->references('id')
              ->on('users');
              // ->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::create('category_post', function (Blueprint $table) {

          $table->dropForeign('post');
          $table->dropForeign('category');

      });


      Schema::create('post', function (Blueprint $table) {

        $table->dropForeign('user');
        // $table->dropForeign('category');

      });
    }
}
