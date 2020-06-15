<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $guarded = [];

    public function registrant()
    {
        return $this->belongsTo(Registrant::class);
    }
}
