<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundPledgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fund_pledges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('post_code')->nullable();
            $table->integer('contact')->nullable();
            $table->string('email')->nullable();

            $table->string('ref_name')->nullable();
            $table->string('relationship')->nullable();
            $table->integer('ref_contact')->nullable();
            $table->string('ref_email')->nullable();

            $table->string('fund_amount')->nullable();
            $table->string('pledge_clause')->nullable();
            $table->string('pledge_time')->nullable();
            $table->date('issue_date')->nullable();
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
        Schema::dropIfExists('fund_pledges');
    }
}
