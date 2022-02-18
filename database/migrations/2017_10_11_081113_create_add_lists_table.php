<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('add_lists', function (Blueprint $table) {
			$table->increments('id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->integer('cat_id');
            $table->integer('user_id');
            $table->string('short_desc')->nullable();
            $table->text('address')->nullable();
            $table->integer('city_id');
            $table->text('zip_code')->nullable();
            $table->text('phone')->nullable();
            $table->string('email',100)->nullable();
            $table->text('website')->nullable();
            $table->text('facebook')->nullable();
            $table->text('linkdin')->nullable();
            $table->text('twitter')->nullable();
            $table->text('google')->nullable();
            $table->text('description')->nullable();
            $table->integer('min_price')->nullable();
            $table->integer('max_price')->nullable();
            $table->text('video')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('is_featured')->default(0);
            $table->integer('reviews')->default(0);
            $table->text('location')->nullable();
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
         Schema::dropIfExists('add_lists'); 
    }
}
