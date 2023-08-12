<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodayClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('today_classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('course_title')->nullable();
			$table->string('video_title')->nullable();
            $table->string('video_url_id')->nullable();
            $table->tinyInteger('today_class')->default(0);
            $table->string('order')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_destroy')->default(1);
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
        Schema::dropIfExists('today_classes');
    }
}
