<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model for Email Campaigns
 */
class Campaign extends Model
{
    const STATUS_ACTIVE   = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_ARCHIVED = 'archived';
    const STATUS_DELETED  = 'deleted';


    protected $table = 'emm_campaigns';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'status'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipients()
    {
        return $this->hasMany('App\Models\Recipient');
    }

}
