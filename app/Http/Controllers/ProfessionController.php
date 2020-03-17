<?php

namespace newhopecrm\Http\Controllers;

use Illuminate\Http\Request;
use newhopecrm\Profession;

class ProfessionController extends Controller
{
    
    public function index()
    {
        return Profession::search(request()->search)
          ->orderBy(request()->orderBy, request()->desc == 'true' ? 'DESC' : 'ASC')
          ->paginate(10);
        
   
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
        return Profession::all();
    }
}
