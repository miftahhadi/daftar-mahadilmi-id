<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrant extends Model
{
    protected $guarded = [];

    public function personal()
    {
        return $this->hasOne(Personal::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }

    public function religious_study()
    {
        return $this->hasOne(ReligiousStudy::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function statement()
    {
        return $this->hasOne(Statement::class);
    }
}
