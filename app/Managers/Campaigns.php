<?php

namespace App\Managers;

use App\Models\Campaign;


/**
 * Class Campaigns
 * @package App\Managers
 */
class Campaigns
{

    public static function getCampaignsList()
    {
        $fields = [ 'id', 'name' ];
        $campaigns = Campaign::select($fields)
            ->orderBy('id', 'asc')
            ->get();

        return $campaigns;
    }

}