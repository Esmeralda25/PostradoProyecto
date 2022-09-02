<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Compromiso;
use App\Models\Adquirido;

use Illuminate\Support\Facades\Validator;



class AdquiridoController extends Controller
{
    public function index()
    {
        //PLANTILLA DONDE EL ESTUDIANTE AGREGA PROYECTO
        return view('estudiante.compromisosadquiridos');//->with('add',$add);
    }

    public function compromisoAdquirido(Request $request){

        //update de adquirido (compromiso adquirido) y el update de actividad
            $rules = [
                'cuantos_programo'=>'required|integer|min:1'
            ];
            $messages = [
                'cuantos_programo.required' => '¿Cuantos vas a programar?',
                'cuantos_programo.integer' => 'Deberia establecer un numero entero',
                'cuantos_programo.min' => 'Al menos debe programar uno',
            ];

            $validator = Validator::make($request->all(),$rules, $messages);
    
            if($validator->fails()){
                return redirect()->back()->withInput()->withErrors($validator, "compromisos");
            } else {
                $nuevo = new Adquirido();
                $nuevo->fill($request->all());
                $nuevo->save();
                return redirect( route('proyectos.comprometerse' ))
                    ->with('message','Es momento de decidir como alcanzar el objetivo')
                    ->with('mensaje_compromiso','Se agregó compromiso correctamente.') ;
            }        
    }
    public function destroy($id)
    { 
        try{
            Adquirido::destroy($id);
            return redirect( route('proyectos.comprometerse' ))
                ->with('message','Es momento de decidir como alcanzar el objetivo')
                ->with('mensaje_compromiso','Se elimino el compromiso correctamente.') ;
        } catch (\Throwable $th) {
            return redirect( route('proyectos.comprometerse' ))
                ->with('message','Es momento de decidir como alcanzar el objetivo')
                ->with('mensaje_compromiso','Error no esperado: ' . $th->getMessage() ) ;
        }
    }
}
