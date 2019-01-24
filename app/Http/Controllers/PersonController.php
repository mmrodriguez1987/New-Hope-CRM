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
        $persons = Person::search(request()->search)
            ->orderBy(
              request()->orderBy,
              request()->desc == 'true' ? 'DESC' : 'ASC'
              )->paginate(10);
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
        $person->firstname = $request->firstname;
        $person->lastname = $request->lastname;
        $person->maritalstatus = $request->maritalstatus;
        $person->birthday = $request->birthday;
        $person->sex = $request->sex;
        $person->address = $request->address;
        $person->street = $request->street;
        $person->city = $request->city;
        $person->zipcode = $request->zipcode;
        $person->email = $request->email;
        $person->cnt_emerg_name = $request->cnt_emerg_name;
        $person->cnt_emerg_phone = $request->cnt_emerg_phone;
        $person->cnt_emerg_address = $request->cnt_emerg_address;
        $person->crt_employer_name = $request->crt_employer_name;
        $person->crt_employer_address = $request->crt_employer_address;
        $person->persontype_id = $request->persontype;
        $person->position_id = $request->position;
        $person->user_creac_id = Auth::id();
        $person->user_modif_id = Auth::id();
        $person->active = $request->active;
        $person->save();

        return [
          'message' => trans('bck.person.store_message'),
          'id' => $persona->id,
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
