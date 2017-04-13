<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('genre_id')->unsigned();
            $table->foreign('genre_id')
                    ->references('id')->on('genre')
                    ->onDelete('cascade');
            $table->integer('year');
            $table->string('trailer_url');
            $table->string('image_url');
            $table->text('description');
            $table->date('show_date');
            $table->time('show_time');
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
        Schema::dropIfExists('movies');
    }
}
