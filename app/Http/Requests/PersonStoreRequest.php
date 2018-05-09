<?php

namespace newhopecrm\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonStoreRequest extends FormRequest
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
          'firstname' => 'required',
          'lastname' => 'required',
          'estadocivil' => 'required',
          'birthdate' => 'required|date_format',
          'sex' => 'required',
          'address' => 'required',
          'street' => 'required',
          'zipcode' => 'required|integer',
          'city' => 'required',
          'email' => 'required|email',
          'cnt_emerg_name' => 'required',
          'cnt_emerg_phone' => 'required|integer',
          'cnt_emerg_address' => 'required',
          'crt_employer_address' => 'required',
          'position_id' => 'required',
          'persontype_id' => 'required',
          'user_creac_id' => 'required',
          'user_modif_id' => 'required',
          'active' => 'required',
        ];
    }
}
