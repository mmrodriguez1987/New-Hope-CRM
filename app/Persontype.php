<?php

namespace newhopecrm;

use Illuminate\Database\Eloquent\Model;

class Persontype extends Model
{
    protected $fillable = [
      'name',
      'user_creac_id',
      'user_modif_id',
      'active'
    ];
}
