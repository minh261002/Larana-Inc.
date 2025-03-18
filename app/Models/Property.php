<?php

namespace App\Models;

use App\Enums\ActiveStatus;
use App\Supports\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'properties';

    protected $guarded = [];

    protected $casts = [
        'is_verified' => 'boolean',
        'status' => ActiveStatus::class,
    ];

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'property_amenities', 'property_id', 'amenity_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'property_services', 'property_id', 'service_id');
    }
}
