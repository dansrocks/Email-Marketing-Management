<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Campaign as CampaignRequest;
use App\Models\Campaign;

use \App\Managers\Campaigns as CampaignsManager;

/**
 * Class Campaigns
 * @package App\Http\Controllers
 */
class Campaigns extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $content = [
            'campaigns' => CampaignsManager::getCampaignsList()
        ];        
        return view('campaigns/list', $content);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('campaigns/add_or_edit');
    }

    /**
     * @param integer $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
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

    /**
     * @param CampaignRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(CampaignRequest $request)
    {
        $campaign = $request->fill(new Campaign());
        
        $response = redirect()->route('campaigns.list');
        
        if (! $campaign->save()) {
            $response->with('errors', 'BAD');
        }
                
        return $response;
    }

    /**
     * @param integer $id
     * @param CampaignRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * @param integer $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
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
