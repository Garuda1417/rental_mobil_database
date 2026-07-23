<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['make', 'model', 'plate_number', 'showroom_id', 'year', 'price_per_day', 'notes'];

    public function showroom()
    {
        return $this->belongsTo(Showroom::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
