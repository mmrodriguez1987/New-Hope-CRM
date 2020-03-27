<?php

namespace newhopecrm;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $table = 'professions';

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
