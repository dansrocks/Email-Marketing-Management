<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampaignStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $available_status = [
            \App\Models\Campaign::STATUS_ACTIVE,
            \App\Models\Campaign::STATUS_INACTIVE,
            \App\Models\Campaign::STATUS_ARCHIVED,
            \App\Models\Campaign::STATUS_DELETED,
        ];

        Schema::table('emm_campaigns',
            function (Blueprint $table) use ($available_status) {
                $table->enum('status', $available_status);
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emm_campaigns', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
