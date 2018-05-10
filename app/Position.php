<?php

namespace newhopecrm;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
      'name',
      'user_creac_id',
      'user_modif_id',
      'active'
    ];

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
