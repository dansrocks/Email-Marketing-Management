<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Recipient
 *
 * @package App\Models
 */
class Recipient extends Model
{
    protected $table = 'emm_recipients';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email'
    ];

    /**
     * ManyToOne Relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function campaign()
    {
        return $this->belongsTo('App\Models\Campaign');
    }
}
