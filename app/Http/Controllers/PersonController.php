<?php

namespace newhopecrm\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use newhopecrm\Http\Requests\PersonStoreRequest;
use newhopecrm\Person;

class PersonController extends Controller
{
    public function index()
    {
        //return Persons::with(['position.name as position','persontype.name as persontype'])
        //->search(request()->search)->orderby('id', 'DESC')->paginate();
        return Person::search(request()->search)
            ->orderBy(request()->orderBy, request()->desc == 'true' ? 'DESC' : 'ASC')
            ->paginate();
    }


    public function store(Request $request)
    {
        $persona = new Persona;
        $persona->firstname = $request->firstname;
        $persona->lastname = $request->lastname;
        $persona->maritalstatus = $request->maritalstatus;
        $persona->birthday = $request->birthday;
        $persona->sex = $request->sex;
        $persona->address = $request->address;
        $persona->street = $request->street;
        $persona->city = $request->city;
        $persona->zipcode = $request->zipcode;
        $persona->email = $request->email;
        $persona->cnt_emerg_name = $request->cnt_emerg_name;
        $persona->cnt_emerg_phone = $request->cnt_emerg_phone;
        $persona->cnt_emerg_address = $request->cnt_emerg_address;
        $persona->crt_employer_name = $request->crt_employer_name;
        $persona->crt_employer_address = $request->crt_employer_address;
        $persona->persontype_id = $request->persontype;
        $persona->position_id = $request->position;
        $persona->user_creac_id = Auth::id();
        $persona->user_modif_id = Auth::id();
        $persona->active = $request->active;
        $persona->save();

        return [
          'message' => trans('backend.person.store_message'),
          'id' => $persona->id,
        ];
    }


    public function update(Request $request, $id)
    {
        $person = Person::find($id);
        $person->fill($request->all());
        $perosn->save();
        return ['message' => trans('backend.person.update_message')];
    }

    public function delete($id)
    {
        $person = Person::destroy($id);
        return ['message' => trans('backend.person.delete_message')];
    }

    public function list()
    {
        return Person::all();
    }
}
