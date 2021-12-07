<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccomodationImgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodation_imgs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('accomodation_id')->unsigned();
            $table->string('img_path')->nullable();
            $table->timestamps();
            $table->foreign('accomodation_id')->references('id')->on('accomodations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accomodation_imgs');
    }
}
