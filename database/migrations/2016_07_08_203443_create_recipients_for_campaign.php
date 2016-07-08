<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipientsForCampaign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emm_recipients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->string('email', 120);
            $table->integer('campaign_id')->unsigned();
            $table->foreign('campaign_id')->references('id')->on('emm_campaigns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('emm_recipients');
    }
}
