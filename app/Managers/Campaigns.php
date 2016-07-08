<?php

namespace App\Managers;

use App\Models\Campaign;


/**
 * Class Campaigns
 * @package App\Managers
 */
class Campaigns
{
    /**
     * @return mixed
     */
    public static function getCampaignsList()
    {
        $fields = [ 'id', 'name' ];
        $campaigns = Campaign::select($fields)
            ->orderBy('id', 'asc')
            ->get();

        return $campaigns;
    }

    /**
     * @param integer $id
     *
     * @return \App\Models\Campaign
     *
     * @throw Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public static function getCampaignById($id)
    {
        return Campaign::findOrFail($id);
    }

}