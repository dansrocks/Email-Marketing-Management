<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\Campaign as CampaignRequest;
use App\Models\Campaign;

class Campaigns extends Controller
{
    public function show()
    {
        $fields = [ 'name' ];
        $campaigns = Campaign::select($fields)
                ->orderBy('created_at', 'asc')
                ->get();
        
        $content = [
            'campaigns' => $campaigns
        ];        
        return view('campaigns/list', $content);
    }
    
    public function add()
    {
        return view('campaigns/add');
    }

    
    public function save(CampaignRequest $request)
    {
        $campaign = $request->fill(new Campaign());
        
        $response = redirect()->route('campaigns.list');
        
        if (! $campaign->save()) {
            $response->with('errors', 'BAD');
        }
                
        return $response;
    }
}
