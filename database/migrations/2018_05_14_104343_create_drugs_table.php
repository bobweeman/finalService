<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('drug_composition_id')->unsigned();
            $table->integer('drug_category_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::table('drugs', function($table) {
            $table->foreign('drug_composition_id')->references('id')->on('drug_compositions')->onDelete('cascade');
            $table->foreign('drug_category_id')->references('id')->on('drug_categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drugs');
    }
}
