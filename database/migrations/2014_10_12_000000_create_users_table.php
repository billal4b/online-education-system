<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('mobile');           
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('blood_group')->nullable();           
            $table->date('dob')->nullable();
            $table->string('nid_no')->nullable();
            $table->string('course_title')->nullable();
            $table->string('course_id')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->enum('status',array('active','inactive','cancel'))->default('inactive');          
            $table->tinyInteger('is_active')->default(0);
            $table->tinyInteger('notification')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
