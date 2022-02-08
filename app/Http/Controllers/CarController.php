<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CarRequest;
use App\Models\Car;

class CarController extends Controller
{
    // Mostrar la lista de automoviles disponibles
    public function index(Request $request)
    {
        // Obtener la lista de automoviles registrados
        $cars = Car::select('id', 'name', 'model', 'mark', 'department', 'created_at', 'updated_at')
                   ->get();
        
        // Retornar lalista de automoviles registrados
        return response()->json($cars);

    }

    // Registrar un nuevo automovil a la lista
    public function store(CarRequest $request)
    {
        // Campos de datos que se tienen en cuenta para registrar un automovil
        $data = [
            'name' => $request->name,
            'model' => $request->model,
            'mark' => $request->mark,
            'department' => $request->department,
        ];

        // Registrar el automovil
        $car = Car::create($data);

        // Evaluar si la acción de registrar el automovil se cumple o no
        if($car){
            // Si cumple
            return response()->json(
                [
                    'car'=>$car,
                    'success'=> 'Automovil registrado exitosamente!',
                    'code'=>200
                ]);

        }
            
        else{
            // No cumple
            return response()->json([
                'error'=> 'Error al registrar el automovil!',
                'code' => 500
            ]);
        }

        
    }

    // Obtener el registro de un automovil existente
    public function edit($id)
    {
        // Obtener un automovil existente a partir de su id
        $car = Car::findOrFail($id);

        // Retornar en json la información del automovil existente
        return response()->json($car);

    }

    // Actualizar el registro de un automovil existente
    public function update(CarRequest $request, $id)
    {   
        // Obtener un automovil para actualizar a partir de su id
        $car = Car::findOrFail($id);

        // Campos de datos que se tienen en cuenta para actualizar un automovil seleccionado
        $data = [
            'name' => $request->name,
            'model' => $request->model,
            'mark' => $request->mark,
            'department' => $request->department,
        ];

        // Actualizar el automovil seleccionado por el id
        $car->update($data);

        // Evaluar si la acción de actualizar automovil se cumple o no
        if($car)
        {
            // Si se cumple
            return response()->json([
                'success'=> 'Automovil actualizado exitosamente!',
                'code'=>200
            ]);

        }
            
        else{

            // No se cumple
            return response()->json([
                'error'=> 'Error al actualizar el automovil!',
                'code'=>500
            ]);
        }


    }

    // Eliminar el registro de un automovil existente
    public function destroy(Request $request, $id)
    {   
        // Obtener un automovil a partir de su id
        $car = Car::findOrFail($id);

        // Eliminar el automovil seleccionado por el id
        $carDelete = $car->delete();

        // Evaluar si la acción de eliminar automovil se cumple o no
        if($carDelete)
        {   
            // Si se cumple
            return response()->json([
                'success'=> 'Automovil eliminado exitosamente!',
                'code'=>200
            ]);
        }

        else{

            // No se cumple
            return response()->json([
                'error'=> 'Error al eliminar el automovil!',
                'code'=>500
            ]);
        }

    }

}
