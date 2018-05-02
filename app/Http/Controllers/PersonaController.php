<?php

namespace newhopecrm\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        $user_id = Auth::id();
        $persona = new Persona;
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->estadocivil = $request->estadocivil;
        $persona->fechanac = $request->fechanac;
        $persona->sexo = $request->sexo;
        $persona->direccion1 = $request->direccion1;
        $persona->direccion2 = $request->direccion2;
        $persona->ciudad = $request->ciudad;
        $persona->zipcode = $request->zipcode;
        $persona->email = $request->email;
        $persona->cntct_emerg_nombre = $request->cntct_emerg_nombre;
        $persona->cntct_emerg_numero = $request->cntct_emerg_numero;
        $persona->cntct_emerg_direccion = $request->cntct_emerg_direccion;
        $persona->empleador_actual = $request->empleador_actual;
        $persona->empleador_actual_dir = $request->empleador_actual_dir;
        $persona->tipopersona_id = $request->tipopersona;
        $persona->cargo_id = $request->cargo;
        $persona->user_creac_id = $user_id;
        $persona->user_modif_id = $user_id;
        $persona->active = $request->active;
        $persona->save();

        return redirect()->route('personas.edit', $persona->id)->with('info', 'persona grabada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona = Persona::find($id);
        return view('personas.show', compact('personas'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cargos = Cargo::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
        $tipopersonas = Tipopersona::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
        $persona = Persona::find($id);

        return view('persona.edit', compact('persona', 'tipopersonas', 'cargos'));
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
        $persona = Persona::find($id);
        $personas->fill($request->all())->save();

        return redirect()->route('personas.edit', $persona->id)->with('Informacion', 'Persona actualizada exitosamente');
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
