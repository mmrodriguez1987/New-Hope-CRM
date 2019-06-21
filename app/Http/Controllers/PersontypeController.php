<?php

namespace newhopecrm\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use newhopecrm\Http\Requests\PersontypeStoreRequest;
use newhopecrm\Persontype;

class PersontypeController extends Controller
{
    public function index()
    {
        return Persontype::search(request()->search)
          ->orderBy(request()->orderBy, request()->desc == 'true' ? 'DESC' : 'ASC')
          ->paginate();
    }

    public function personTypelist()
    {
        return Persontype::all();
    }

    public function store(Request $request)
    {
        $persontype = new Persontype;
        $persontype->name = $request->name;
        $persontype->user_creac_id = Auth::id();
        $persontype->user_modif_id = Auth::id();
        $persontype->active = $request->active;
        $persontype->save();

        return [
          'message' => trans('bck.persontype.store_message'),
          'id' => $personatype->id,
        ];
    }


    public function update(Request $request, $id)
    {
        $persontype = Persontype::find($id);
        $persontype->fill($request->all());
        $persontype->save();

        return ['message' => trans('bck.persontype.update_message')];
    }


    public function delete($id)
    {
        $persontype = Persontype::destroy($id);
        return ['message' => trans('bck.persontype.delete_message')];
    }

    public function list()
    {
        return Persontype::all();
    }
}
