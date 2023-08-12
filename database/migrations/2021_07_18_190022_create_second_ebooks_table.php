<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecondEbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('second_ebooks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('published')->default(EBOOK_UNPUBLISHED)->comment('1=Unpublished,2=Published');
            $table->dateTime('publish_time')->nullable();
            $table->tinyInteger('course_id')->comment('Course ID');
            $table->tinyInteger('subject_type');
            $table->string('topic')->nullable();
            $table->tinyInteger('content_type');
            $table->longText('content');
            $table->string('document');
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
        Schema::dropIfExists('second_ebooks');
    }
}
