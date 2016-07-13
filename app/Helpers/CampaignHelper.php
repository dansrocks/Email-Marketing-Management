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
        $domains = [];
        foreach ($campaign->recipients as $recipient) {
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

    public static function createRecipientsCsvFile(\App\Models\Campaign $campaign)
    {
        $filename = false;

        if ($campaign) {
            $filename = EnvironmentHelper::getTempFilename(null);
            $fh = fopen($filename, "w+");
            if (! $fh) {
                throw new \Exception("Error al abrir fichero para escritura");
            }
            $headers = ['name', 'email'];
            fputcsv($fh, $headers);
            foreach ($campaign->recipients as $recipient) {
                fputcsv($fh, [$recipient->name, $recipient->email]);
            }
            fclose($fh);
        }

        return $filename;
    }

}