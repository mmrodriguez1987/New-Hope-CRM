<?php

namespace newhopecrm;

use Illuminate\Database\Eloquent\Model;

class Tipopersona extends Model
{
    protected $table = 'personatipo';
    protected $fillable = ['nombre','user_creac_id','user_modif_id','estado'];
}
