<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model for Email Campaigns
 */
class Campaign extends Model
{
    protected $table = 'emm_campaigns';

    public $timestamps = true;

    protected $fillable = [
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipients()
    {
        return $this->hasMany('App\Models\Recipient');
    }

}
