<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Showroom;
use Illuminate\Http\Request;

class AdminCarController extends Controller
{
    public function index()
    {
        $cars = Car::with('showroom')->orderBy('created_at', 'desc')->get();
        return response()->json($cars);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'plate_number' => 'required|string|max:50|unique:cars',
            'showroom_id' => 'required|exists:showrooms,id',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'price_per_day' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        $car = Car::create($data);
        return response()->json($car->load('showroom'), 201);
    }

    public function show(Car $car)
    {
        return response()->json($car->load('showroom'));
    }

    public function update(Request $request, Car $car)
    {
        $data = $request->validate([
            'make' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'plate_number' => 'nullable|string|max:50|unique:cars,plate_number,' . $car->id,
            'showroom_id' => 'nullable|exists:showrooms,id',
            'year' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'price_per_day' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        $car->update($data);
        return response()->json($car->fresh()->load('showroom'));
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return response()->json(['deleted' => true]);
    }

    public function getShowrooms()
    {
        $showrooms = Showroom::all(['id', 'name', 'city']);
        return response()->json($showrooms);
    }
}
