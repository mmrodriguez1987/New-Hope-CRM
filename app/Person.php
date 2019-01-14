<?php

namespace newhopecrm;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';
    protected $fillable = ['firstname','lastname', 'maritalstatus','birthday','sex', 'address','street','state', 'zipcode',
      'city', 'email', 'cnt_emerg_name', 'cnt_emerg_phone', 'cnt_emerg_address', 'crt_employer_name','crt_employer_address',
      'position_id', 'persontype_id', 'user_creac_id', 'user_modif_id', 'active' ];

    public function position() {
      return $this->belongsTo(Position::class, 'position_id')
    }

    public function persontype () {
      return $this->belongsTo(Persontype::class, 'persontype_id')
    }

    public function scopeSearch($query, $target)
    {
        if ($target != '') {
            return $query->
                where('firstname', 'like', "%$target%")
                ->orWhere('lastname', 'like', "%$target%")
                ->orWhere('address', 'like', "%$target%")
                ->orWhere('email', 'like', "%$target%")
                ->orWhere('cnt_emerg_name', 'like', "%$target%")
                ->orWhere('cnt_emerg_address', 'like', "%$target%")
                ->orWhere('crt_employer_address', 'like', "%$target%")
                ->orWhere('crt_employer_name', 'like', "%$target%")
                ->orWhere('id', $target);
        }
    }
}
