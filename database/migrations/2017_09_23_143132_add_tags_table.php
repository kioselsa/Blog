<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->timestamps();
        });

        //Tabla para relacion pivote, muchos a muchos, nombre article_tag en singular compuesto pos las dos tablas que forman la relacion.
        //Podemos crear mas tablas en una misma relación, como esta:
        Schema::create('article_tag',function (Blueprint $table){
           $table->increments('id');
           $table->integer('article_id')->unsigned();
           $table->integer('tag_id')->unsigned();

           //Llaves foraneas de la relacion
           $table->foreign('article_id')->references('id')->on('articles');
           $table->foreign('tag_id')->references('id')->on('tags');

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
        Schema::dropIfExists('tags');
    }
}
