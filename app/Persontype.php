<?php

namespace newhopecrm;

use Illuminate\Database\Eloquent\Model;

class Persontype extends Model
{
    protected $table ='person_types';
    
    public function persons()
    {
        return $this->hasMany(Persons::class);
    }

    //Scopes
    public function scopeSearch($query, $target)
    {
        if ($target != '') {
            return $query->
                where('name', 'like', "%$target%")
                ->orWhere('id', $target);
        }
    }
}
