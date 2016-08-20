<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bulletin
 *
 * @package App\Models
 */
class Bulletin extends Model
{
    protected $table = 'emm_bulletins';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'start_at',
        'ended_at',
        'subject',
        'body',
        'sender'
    ];
}