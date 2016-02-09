<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Campaign as CampaignModel;

/**
 * 
 */
class Campaign extends Request
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'campaign-name' => 'required|max:100'
        ];
    }
    
    public function messages()
    {
        return [
            'campaign-name.required' => "A name for campaign is required",
            'campaign-name.max'  => "Campaign's name too long (max. 100 letters)",
        ];
    }
    
    /**
     * Rellena una Campaña (modelo) con los datos del formulario
     * 
     * @param CampaignModel $model
     * 
     * @return CampaignModel
     */
    public function fill(CampaignModel $model)
    {
        $request_values = $this->all();
        
        foreach ($model->getFillable() as $property) {
            $key = sprintf('campaign-%s', $property);
            if (isset($request_values[$key])) {
                $model->$property = $request_values[$key];
            }
        }
        
        return $model;
    }
    
}
