<?php

namespace newhopecrm\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Persontype extends Model
{
    use HasFactory;
    protected $table ='person_types';
    
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
