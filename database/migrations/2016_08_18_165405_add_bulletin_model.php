<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBulletinModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emm_bulletins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->dateTime('start_at');
            $table->dateTime('ended_at')->nullable();
            $table->string('subject', 120);
            $table->mediumText('body');
            $table->string('sender_name', 120)->nullable();
            $table->string('sender_email', 120)->nullable();
            $table->integer('campaign_id')->unsigned()->nullable()->default(null);
            $table->foreign('campaign_id')->references('id')->on('emm_campaigns');
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
        Schema::drop('emm_bulletins');
    }
}
