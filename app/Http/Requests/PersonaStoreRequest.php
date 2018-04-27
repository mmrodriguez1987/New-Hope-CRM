<?php

namespace newhopecrm\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'nombre' => 'required',
          'apellido' => 'required',
          'primernombre' => 'required',
          'edad' => 'required|integer',
          'estadocivil' => 'required',
          'fechanac' => 'required|date_format',
          'sexo' => 'required',
          'direccion1' => 'required',
          'direccion2' => 'required',
          'zipcode' => 'required|integer',
          'ciudad' => 'required',
          'email' => 'required|email',
          'cntct_emerg_nombre' => 'required',
          'cntct_emerg_numero' => 'required|integer',
          'cntct_emerg_direccion' => 'required',
          'empleador_actual' => 'required',
          'tipopersona_id' => 'required',
          'nombre' => 'required',
          'active' => 'required'
        ];
    }
}
