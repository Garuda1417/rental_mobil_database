<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'car.showroom'])->orderBy('created_at', 'desc')->get();
        return response()->json($bookings);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'model_choice' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string',
        ]);

        // find or create user
        $user = User::firstOrCreate(
            ['email' => $data['email']],
            ['name' => $data['name'], 'password' => bcrypt(str()->random(12))]
        );

        // find a car by model (simple matching)
        $car = Car::where('model', $data['model_choice'])->first();
        if (! $car) {
            $car = Car::create([ 'model' => $data['model_choice'], 'plate_number' => 'AUTO-'.time() ]);
        }

        $booking = Booking::create([
            'user_id' => $user->id,
            'car_id' => $car->id,
            'start_date' => $data['date'],
            'end_date' => $data['date'],
            'total_price' => 0,
            'status' => 'Pending',
        ]);

        return response()->json($booking->load(['user','car']));
    }

    public function update(Request $request, Booking $booking)
    {
        $data = $request->validate([
            'status' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);
        $booking->update($data);
        return response()->json($booking->fresh());
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return response()->json(['deleted' => true]);
    }
}
