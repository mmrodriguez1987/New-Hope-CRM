<?php

namespace newhopecrm\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use newhopecrm\Http\Requests\PositionStoreRequest;
use newhopecrm\Position;

class PositionController extends Controller
{
    public function index()
    {
        return Position::search(request()->search)
          ->orderBy(request()->orderBy, request()->desc == 'true' ? 'DESC' : 'ASC')
          ->paginate();
    }

    public function store(Request $request)
    {
        $position = new Position;
        $position->name = $request->name;
        $position->user_creac_id = Auth::id();
        $position->user_modif_id = Auth::id();
        $position->active = $request->active;
        $position->save();

        return [
          'message' => trans('bck.position.store_message'),
          'id' => $position->id,
        ];
    }


    public function update(Request $request, $id)
    {
        $position = Position::find($id);
        $position->fill($request->all());
        $position->save();

        return ['message' => trans('bck.position.update_message')];
    }


    public function delete($id)
    {
        $position = Position::destroy($id);
        return ['message' => trans('bck.position.delete_message')];
    }

    public function list()
    {
        return Position::all();
    }
}
