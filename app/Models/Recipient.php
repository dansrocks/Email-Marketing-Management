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
        return $this->hasOne('App\Models\Campaign');
    }
}
