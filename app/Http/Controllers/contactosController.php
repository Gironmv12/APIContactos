<?php

namespace App\Http\Controllers;
use App\Models\Contactos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class contactosController extends Controller
{
    //
    //metodo para obtener todos los contactos
    public function index(){
        $contactos = Contactos::all();
        //validar
        if($contactos-> isEmpty()){
            $data = [
                'status' => 404,
                'message' => 'No se encontraron contactos'
            ];
            return response()->json($data, 404);
        }
        //si se encuentran contactos
        return response()->json($contactos, 200);
    }
    //metodo para crear un contacto

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'email' => 'required|email',
            'telefono' => 'required'
        ]);
    
        if($validator->fails()){
            $data = [
                'status' => 400,
                'message' => 'Datos incorrectos',
                'errors' => $validator->errors()
            ];
            return response()->json($data, 400);
        }
        $contactos = Contactos::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono
        ]);
    
        if(!$contactos){
            $data = [
                'status' => 500,
                'message' => 'Error al crear el contacto'
            ];
            return response()->json($data, 500);
        }
        $data = [
            'status' => 200,
            'message' => 'Contacto creado',
            'contacto' => $contactos
        ];
        return response()->json($data, 200);
    }

    //metodo para actualizar un contacto
    public function update(Request $request, $id)
    {
        $contactos = Contactos::find($id);
        if(!$contactos){
            $data = [
                'status' => 404,
                'message' => 'Contacto no encontrado'
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'email' => 'required|email',
            'telefono' => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'status' => 400,
                'message' => 'Datos incorrectos',
                'errors' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        $contactos->nombre = request('nombre');
        $contactos->email = request('email');
        $contactos->telefono = request('telefono');

        $contactos->save();

        $data = [
            'status' => 200,
            'message' => 'Contacto actualizado',
            'contacto' => $contactos
        ];
        return response()->json($data, 200);
    }

    //metodo para eliminar un contacto
    public function destroy($id){
        $contactos = Contactos::find($id);
        if(!$contactos){
            $data = [
                'status' => 404,
                'message' => 'Contacto no encontrado'
            ];
            return response()->json($data, 404);
        }
        $contactos->delete();
        $data = [
            'status' => 200,
            'message' => 'Contacto eliminado'
        ];
        return response()->json($data, 200);
    }

}
