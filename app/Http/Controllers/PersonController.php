<?php

namespace newhopecrm\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use newhopecrm\Http\Requests\PersonStoreRequest;
use newhopecrm\Person;

class PersonController extends Controller
{
    
    public function index()
    {
        return Person::orderBy('id', 'DESC')->paginate();
        
        
    }

    public function getAllPersons()
    {
        return Person::search(request()->search)
            ->orderBy(request()->orderBy, request()->desc == 'true' ? 'DESC' : 'ASC')
            ->paginate();
    }


    public function store(Request $request)
    {
        $person = new Person;
        $person->first_name = $request->first_name;
        $person->last_name = $request->last_name;
        $person->marital_status = $request->marital_status;
        $person->birthday = $request->birthday;
        $person->sex = $request->sex;
        $person->address = $request->address;
        $person->street = $request->street;
        $person->city = $request->city;
        $person->postal_code = $request->postal_code;
        $person->email = $request->email;
        $person->cnt_emerg_name = $request->cnt_emerg_name;
        $person->cnt_emerg_phone = $request->cnt_emerg_phone;
        $person->cnt_emerg_address = $request->cnt_emerg_address;
        $person->crt_employer_name = $request->crt_employer_name;
        $person->crt_employer_address = $request->crt_employer_address;
        $person->persontype_id = $request->persontype;
        $person->position_id = $request->position;
        $person->active = $request->active;
        $person->save();

        return [
          'message' => trans('bck.person.store_message'),
          'id' => $person->id,
        ];
    }


    public function update(Request $request, $id)
    {
        $person = Person::find($id);
        $person->fill($request->all());
        $person->save();
        return ['message' => trans('bck.person.update_message')];
    }

    public function delete($id)
    {
        $person = Person::destroy($id);
        return ['message' => trans('bck.person.delete_message')];
    }

    public function list()
    {
        return Person::all();
    }
}
