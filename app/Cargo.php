<?php

namespace newhopecrm;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargos';
    protected $fillable = ['nombre','user_creac_id','user_modif_id'];
}
