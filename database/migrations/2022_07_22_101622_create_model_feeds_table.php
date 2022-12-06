<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_feeds', function (Blueprint $table) {
            $table->id();
            $table->integer('model_id');
            $table->longtext('description')->nullable();;
            $table->string('media')->nullable();;
            $table->string('media_type')->nullable();;
            $table->integer('status');
            $table->time('schedule_date');
            $table->string('price')->nullable();
            $table->string('earnings')->nullable();
            $table->string('likes')->nullable();
            $table->string('unlock')->nullable();
            $table->integer('explore')->nullable();
           
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
        Schema::dropIfExists('model_feeds');
    }
}
