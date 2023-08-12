<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('url')->nullable();    
            $table->text('content');
            $table->string('categorie')->nullable();           
            $table->date('publish_at')->nullable();
            $table->date('date_time')->nullable();
            $table->string('image')->nullable();
            $table->string('thumb')->nullable();
            $table->string('order')->nullable();  
            $table->tinyInteger('is_active')->default(1);            
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
        Schema::dropIfExists('blogs');
    }
}
