<?php

namespace App\Managers;

use App\Models\Bulletin;


/**
 * Class Campaigns
 * @package App\Managers
 */
class Bulletins
{
    /**
     * @return mixed
     */
    public static function getAllBulletinsList()
    {
        $fields = [ 'id', 'name', 'start_at', 'ended_at'];
        $bulletins = Bulletin::select($fields)
            ->orderBy('start_at', 'desc')
            ->get();

        return $bulletins;
    }

    /**
     * @return mixed
     */
    public static function getBulletinList($campaignId)
    {
        $fields = [ 'id', 'name', 'start_at', 'ended_at'];
        $bulletins = Bulletin::select($fields)
            ->where('campaign_id', '=', $campaignId)
            ->orderBy('id', 'asc')
            ->get();

        return $bulletins;
    }
}