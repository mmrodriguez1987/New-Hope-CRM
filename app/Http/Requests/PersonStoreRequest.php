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
          'first_name' => 'required',
          'last_name' => 'required',
          'marital_status' => 'required',
          'birthdate' => 'required|date_format',
          'sex' => 'required',
          'address' => 'required',
          'postal_code' => 'required|integer',
          'city' => 'required',
          'cid' => 'required',
          'email' => 'required|email',
          'position_id' => 'required',
          'persontype_id' => 'required',         
          'active' => 'required',
        ];
    }
}
