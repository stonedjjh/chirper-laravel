<?php

namespace App\Http\Controllers;

//se agrego esta linea para redireccionar la respuesta
use Illuminate\Http\RedirectResponse;
use App\Models\Chirp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/*se comento ya que no se usa
use Illuminate\Http\Response; */
//agregamos para manejar las vistas esta linea
use Illuminate\View\View;
/*se agrego esta linea para manejar los errores con el Validator en vez de como se explica por default
para no modificar los mensajes de error por defecto*/
use Illuminate\Support\Facades\Validator;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //
    public function index(): view 
    {
        //se cambio el metodo y ahora busca los mensajes desde el ultimo creado hasta el primero
        return view('chirps.index', [
            'chirps' => Chirp::with('user')->latest()->get(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    //
    public function store(Request $request): RedirectResponse
    {
        //
        /*se valida la entrada de datos el campo message debe ser requerido de tipo string y con una
        longitud maxima de 255 si falla alguna validacion se retorna a la vista y se detiene la ejecución
        código original del tutorial
        
        original
        $validated = $request->validate([
            'message' => 'required|string|max:255',
            
        ]);*/

        //Cambios realizados para personalizar los mensajes de error posibles.
        $validator = Validator::make($request->all(), [
            'message' => 'required|string|max:255'            
        ],
        $messages = [
            'required' => 'El campo :attribute es requerido',
            'string' => 'El :attribute debe ser de tipo texto',            
            'max' => 'El campo :attribute no puede ser mayor a 255 caracteres',            
        ])->validate();
 
        //Se usa el metodo create en vez del save
        $request->user()->chirps()->create($validator);
 
        return redirect(route('chirps.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        //
    }
}
