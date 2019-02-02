<?php

namespace newhopecrm;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //
    protected $table = 'persons';
    
    protected $fillable = [
        'first_name',
        'last_name',
        'marital_status',
        'birthdate',
        'cid',
        'sex',
        'address',
        'street',
        'postal_code',
        'city',
        'state',
        'profession_id',
        'email',
        'cnt_emerg_name',
        'cnt_emerg_phone',
        'cnt_emerg_address',
        'crt_employer_name',
        'crt_employer_address',
        'position_id',
        'person_type_id',
        'active'
    ];

    public function scopeSearch($query, $target) {
        if ($target != '') {
            $query->where('first_name', 'like', "%$target%")
            ->orWhere('last_name', 'like', "%$target%")
            ->orWhere('marital_status', 'like', "%$target%")
            ->orWhere('birthdate', 'like', "%$target%");
            
        }
        return $query;
    }


}
