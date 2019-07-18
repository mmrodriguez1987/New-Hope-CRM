<?php

namespace newhopecrm\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use newhopecrm\Http\Requests\PositionStoreRequest;
use newhopecrm\Position;

class PositionController extends Controller
{
    public function index()
    {
        $position = Position::search(request()->search)
          ->orderBy(request()->orderBy, request()->desc == 'true' ? 'DESC' : 'ASC')
          ->paginate(request()->page);

        return response()->json([
            'status' => 'success',
            'users' => $position->toArray()
        ], 200);
    }

    public function store()
    {
        $position = Position::create(request()->all());
        $position->save();

        return [
          'message' => trans('bck.position.store_message'),
          'id' => $position->id,
        ];
    }


    public function update($id)
    {
        $position = Position::find($id);
        $position->fill(request()->all());
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
        $position = Position::all();

        return response()->json([
            'status' => 'success',
            'users' => $position->toArray()
        ], 200);
    }
}
