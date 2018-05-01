<?php

namespace newhopecrm\Http\Controllers;

use Illuminate\Http\Request;
use newhopecrm\Http\Requests\PersonaStoreRequest;
use newhopecrm\Persona;
use newhopecrm\Cargo;
use newhopecrm\Tipopersona;
use newhopecrm\Carbon;

class PersonaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::orderBy('nombre', 'DESC')->paginate();
        return view('persona.index', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargo_selected = 1;
        $tipopersona_selected = 1;
        $cargos = Cargo::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
        $tipopersonas = Tipopersona::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
        return view('persona.create', compact('cargos', 'tipopersonas'))->with('cargo_selected', $cargo_selected)->with('tipopersona_selected', $tipopersona_selected);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = Persona::create($request->all());
        $persona->cargo()->attach($request->get('cargo'));

        return redirect()->route('persona.edit', $persona->id)->with('info', 'persona grabada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
