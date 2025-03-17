<?php

namespace App\Models;

use App\Enums\Amenity\AmenityGroup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    protected $table = 'amenities';

    protected $guarded = [];

    protected $casts = [
        'group' => AmenityGroup::class,
    ];

}