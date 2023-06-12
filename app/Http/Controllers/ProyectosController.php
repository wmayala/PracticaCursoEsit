<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyectos;
use Illuminate\Support\Facades\DB;

use function Termwind\render;

class ProyectosController extends Controller
{
    public function index(){

        $proyectos=DB::table('proyectos')->get();
       
        return view('proyectos.index', compact('proyectos'));
    }

    public function create(){
        return view('proyectos.create');
    }

    public function store(Request $request){
        
        $request->validate([
            'NombreProyecto'=>['required', 'string', 'max:100'],
            'FuenteFondos'=>['required', 'string', 'max:100'],
            'MontoPlanificado'=>['required'],
            'MontoPatrocinado'=>['required'],
            'MontoFondosPropios'=>['required'],
        ]);

        if($request){
            
            $proyectos = new Proyectos();
            
            $proyectos->NombreProyecto = $request->input('NombreProyecto');
            $proyectos->FuenteFondos = $request->input('FuenteFondos');
            $proyectos->MontoPlanificado = $request->input('MontoPlanificado');
            $proyectos->MontoPatrocinado = $request->input('MontoPatrocinado');
            $proyectos->MontoFondosPropios = $request->input('MontoFondosPropios');

            $proyectos->save();
       }

        return redirect(route('proyectos.index'));
    }

    public function edit($id){

        $proyecto=Proyectos::find($id);
        
        return view('proyectos.edit', ['proyecto'=>$proyecto]);
    }

    public function update(Request $request, $id){

        $request->validate([
            'NombreProyecto'=>['required', 'string', 'max:100'],
            'FuenteFondos'=>['required', 'string', 'max:100'],
            'MontoPlanificado'=>['required'],
            'MontoPatrocinado'=>['required'],
            'MontoFondosPropios'=>['required'],
        ]);
       
        $proyectos = Proyectos::findOrFail($id);
        $proyectos->NombreProyecto = $request->NombreProyecto;
        $proyectos->FuenteFondos = $request->FuenteFondos;
        $proyectos->MontoPlanificado = $request->MontoPlanificado;
        $proyectos->MontoPatrocinado = $request->MontoPatrocinado;
        $proyectos->MontoFondosPropios = $request->MontoFondosPropios;

        $proyectos->save();

        return redirect(route('proyectos.index'));
    }

    public function destroy($id){

        $proyectos = Proyectos::findOrFail($id);

        $proyectos->delete();

        return redirect(route('proyectos.index'));
    }
}
