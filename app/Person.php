<?php

namespace newhopecrm;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{    
    
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function persontype()
    {
        return $this->belongsTo(Persontype::class, 'persontype_id');
    }

    public function scopeSearch($query, $target)
    {
         if ($target != '') {
            return $query->
                    where('first_name', 'like', "%$target%")
                ->orWhere('last_name', 'like', "%$target%")
                ->orWhere('marital_status', 'like', "%$target%")
                ->orWhere('birthdate', 'like', "%$target%")
                ->orWhere('sex', 'like', "%$target%")
                ->orWhere('address', 'like', "%$target%")
                ->orWhere('email', 'like', "%$target%")
                ->orWhere('cnt_emerg_name', 'like', "%$target%")
                ->orWhere('cnt_emerg_phone', 'like', "%$target%")
                ->orWhere('cnt_emerg_address', 'like', "%$target%")
                ->orWhere('crt_employer_name', 'like', "%$target%")
                ->orWhere('crt_employer_address', 'like', "%$target%")
                ->orWhere('id', $target);
        }
    }
}
