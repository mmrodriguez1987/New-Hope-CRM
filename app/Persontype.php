<?php

namespace newhopecrm;

use Illuminate\Database\Eloquent\Model;

class Persontype extends Model
{
    protected $table = 'persontypes';
    protected $fillable = ['name', 'user_creac_id', 'user_modif_id', 'active' ];

    public function persons(){
      retunr $this->hasMany(Persons::class);
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
