<?php

namespace newhopecrm;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $table = 'professions';

    public function persons() {

        return $this->hasMany(Person::class);
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
