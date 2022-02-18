<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo')->nullable();
            $table->string('favico_ico')->nullable();
            $table->longText('about')->nullable();
            $table->text('footer')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('office_email')->nullable();
            $table->string('title')->nullable();
            $table->text('privacy')->nullable();
            $table->text('sitemap')->nullable();
            $table->text('terms')->nullable();
            $table->text('gmaps')->nullable();
            $table->text('email_body')->nullable();
            $table->string('color')->nullable();
            $table->text('metakeywords')->nullable();
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
        Schema::dropIfExists('general_settings');
    }
}
