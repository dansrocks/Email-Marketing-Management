<?php

namespace App\Http\Controllers;

use App\Helpers\CampaignHelper;
use App\Managers\Campaigns as CampaignsManager;
use App\Models\Recipient;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Str;

/**
 * Class Recipients
 *
 * @package App\Http\Controllers
 */
class Recipients extends Controller
{
    /**
     * Acción para seleccionar una campaña antes de gestionar
     * los destinarios
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function selectCampaign()
    {
        $content = [
            'campaigns' => CampaignsManager::getCampaignsList()
        ];

        return view('recipients/select_campaign', $content);
    }

    /**
     * Muestra estadísticas sobre los recipientes asociados
     * a la campaña $id
     *
     * @param integer $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showStats($id)
    {
        $campaign = CampaignsManager::getCampaignById($id);
        $recipients_stats = CampaignHelper::getRecipientsStats($campaign);

        $content = [
            'campaign' => $campaign,
            'domains' => $recipients_stats
        ];

        return view('recipients/list', $content);
    }


    /**
     * Generador de Recipients para pruebas
     */
//    public function seeder()
//    {
//        $max_recipients = 100;
//
//        $names_str = "Hugo Lucia Daniel María Pablo Martina Alejandro Paula Álvaro Adrián Sofía David Valeria Martín Carla Mario Sara Diego Alba";
//        $surnames_str = "García González Rodríguez Fernández López Martinez Sánchez Perez Gómez Martín Jimenez Ruiz Hernández Diaz Moreno Muñoz Álvarez Romero Alonso Gutierrez Navarro Torres Dominguez Vazquez Ramos Gil Blanco Molina Morales SUarez Ortega Delgado Castro ORtiz Rubio Sanz Medina Cortes Castillo Cano Prieto Santos García González Díaz Muñoz";
//        $domains_list = "gmail.com hotmail.com msn.com hotmail.es ine.es upm.edu.es nyc.com emailchimp.com";
//
//        $names = explode(' ', $names_str);
//        $surnames  = explode(' ', $surnames_str);
//        $domains  = explode(' ', $domains_list);
//
//        $num_names = count($names);
//        $num_surnames = count($surnames);
//        $num_domains = count($domains);
//
//
//
//        $emails = [];
//
//        $num_recipients = 0;
//        while ($num_recipients < $max_recipients) {
//            $rnd_name = rand(0, $num_names-1);
//            $rnd_surname = rand(0, $num_surnames-1);
//            $name = sprintf("%s %s", $names[$rnd_name], $surnames[$rnd_surname]);
//            $mail_user = str_replace('-', '.', Str::slug($name));
//            $domain = $domains[rand(0, $num_domains-1)];
//
//            $i = 0;
//            do {
//                $trail = ($i>0) ? sprintf("_%d", $i) : '';
//                $email = sprintf("%s%s@%s", $mail_user, $trail, $domain);
//                $i++;
//            } while (isset($emails[$email]));
//            $emails[$email] = true;
//
//            $recipient = new Recipient();
//            $recipient->name = $name;
//            $recipient->email = $email;
//            $recipient->campaign_id = 4;
//            $recipient->save();
//
//            $num_recipients++;
//
//            printf("Recipient #%s: %s (%s)\n", $num_recipients, $name, $email);
//        }
//    }
}
