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
        $fields = [ 'id', 'name' ];
        $campaigns = Campaign::select($fields)
                ->orderBy('id', 'asc')
                ->get();
        
        $content = [
            'campaigns' => $campaigns
        ];        
        return view('campaigns/list', $content);
    }
    
    public function add()
    {
        return view('campaigns/add_or_edit');
    }

    
    public function edit($id)
    {
        $campaign = Campaign::find($id);
        
        if ($campaign) {
            $content = [ 'campaign' => $campaign ];
            $response = view('campaigns/add_or_edit', $content);
        } else {
            $response = redirect()->route('campaigns.list')
                    ->with('message', 'Invalid campaign.');
        }
        
        return $response;
    }
    
    public function create(CampaignRequest $request)
    {
        $campaign = $request->fill(new Campaign());
        
        $response = redirect()->route('campaigns.list');
        
        if (! $campaign->save()) {
            $response->with('errors', 'BAD');
        }
                
        return $response;
    }

    public function update($id, CampaignRequest $request)
    {
        $response = redirect()->route('campaigns.list');

        $campaign = Campaign::find($id);
        if ($campaign) {
            $request->fill($campaign)->save();
            $response->with('message', 'Campaign updated');
        } else {
            $response->with('message', 'Invalid campaign');
        }
                
        return $response;
    }
    
    public function delete($id)
    {
        $campaign = Campaign::find($id);

        $response = redirect()->route('campaigns.list');
        
        if ($campaign) {
            $campaign->delete();
            $response->with('message', 'Campaign has been deleted sucessfully');
        } else {
            $response->with('message', 'Invalid campaign.');
        }
        
        return $response;
    }
}
