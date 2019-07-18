<?php

namespace newhopecrm\Http\Controllers\Admin;

use Illuminate\Http\Request;
use newhopecrm\Profession;

class ProfessionController extends Controller
{
    
    public function index()
    {
        $profession = Profession::search(request()->search)
          ->orderBy(request()->orderBy, request()->desc == 'true' ? 'DESC' : 'ASC')
          ->paginate(10);
        
        return response()->json([
            'status' => 'success',
            'users' => $profession->toArray()
        ], 200);
    }

    public function store(Request $request)
    {
        $profession = new Profession;
        $profession->name = $request->name;
        $profession->save();

        return [
            'message' => trans('bck.profession.store_message'),
            'id' => $profession->id
        ];
    }


    public function update(Request $request, $id)
    {
        $profession = Profession::find($id);
        $profession->fill($request->all());
        $profession->save();
        return ['message' => trans('bck.profession.update_message')];
    }

 
    public function delete($id)
    {
        $profession = Profession::destroy($id);
        return ['message' => trans('bck.profession.delete_message')];
    }
    

    public function list() 
    {
        $profession = Profession::all();

        return response()->json([
            'status' => 'success',
            'users' => $profession->toArray()
        ], 200);
    }
}
