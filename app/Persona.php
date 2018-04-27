<?php

namespace newhopecrm;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persona';
    protected $fillable = [
      'nombre','apellido','primernombre','edad','estadocivil','fechanac','sexo',
      'direccion1','direccion2','zipcode','ciudad','email','cntct_emerg_nombre',
      'cntct_emerg_numero','cntct_emerg_direccion','empleador_actual','empleador_actual_dir',
      'cargo_id','tipopersona_id','user_creac_id','user_modif_id','active'
    ];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    public function tipopersona()
    {
        return $this->belongsTo(Tipoopersona::class);
    }
}
