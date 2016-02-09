<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model for Email Campaigns
 */
class Campaign extends Model
{
    protected $table = 'emm_campaigns';
    
    protected $fillable = [
        'name'
    ];
}
