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
            'car_id' => 'nullable|exists:cars,id',
            'model_choice' => 'nullable|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string',
        ]);

        // find or create user
        $user = User::firstOrCreate(
            ['email' => $data['email']],
            ['name' => $data['name'], 'password' => bcrypt(str()->random(12))]
        );

        // Get car - prioritize car_id from database
        if (!empty($data['car_id'])) {
            $car = Car::find($data['car_id']);
        } else {
            // Fallback to model_choice if car_id not provided
            $car = Car::where('model', $data['model_choice'])->first();
            if (!$car) {
                $car = Car::create([
                    'model' => $data['model_choice'],
                    'plate_number' => 'AUTO-'.time(),
                    'make' => 'Unknown',
                    'year' => date('Y'),
                    'price_per_day' => 0,
                    'showroom_id' => 1
                ]);
            }
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

    public function show(Booking $booking)
    {
        return response()->json($booking->load(['user', 'car.showroom']));
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return response()->json(['deleted' => true]);
    }

    // Store booking from user booking page (hidden endpoint)
    public function storeFromBooking(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:50',
                'car_id' => 'required|exists:cars,id',
                'model_choice' => 'nullable|string|max:255',
                'date' => 'required|date',
                'location' => 'required|string',
            ]);

            // find or create user
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                ['name' => $data['name'], 'password' => bcrypt(str()->random(12))]
            );

            // Get car from database
            $car = Car::find($data['car_id']);
            if (!$car) {
                return response()->json([
                    'success' => false,
                    'message' => 'Vehicle not found'
                ], 404);
            }

            $booking = Booking::create([
                'user_id' => $user->id,
                'car_id' => $car->id,
                'start_date' => $data['date'],
                'end_date' => $data['date'],
                'total_price' => 0,
                'status' => 'Pending',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Booking created successfully',
                'booking' => $booking->load(['user', 'car'])
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
