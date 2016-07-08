<?php

namespace App\Helpers;


use App\Models\Campaign;

/**
 * Class CampaignHelper
 *
 * @package App\Helpers
 */
class CampaignHelper
{
    /**
     * @param Campaign $campaign
     *
     * @return mixed[]
     */
    public static function getRecipientsStats(\App\Models\Campaign $campaign)
    {
        $recipients = $campaign->recipients;

        $domains = [];
        foreach ($recipients as $recipient) {
            $email_parts = explode('@', $recipient->email, 2);
            $domain = array_pop($email_parts);
            if (isset($domains[$domain])) {
                $domains[$domain]++;
            } else {
                $domains[$domain] = 1;
            }
        }

        arsort($domains);

        return $domains;
    }
}