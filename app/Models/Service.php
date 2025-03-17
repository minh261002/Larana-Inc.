<?php

namespace App\Models;

use App\Enums\Service\ServiceGroup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $guarded = [];

    protected $casts = [
        'group' => ServiceGroup::class
    ];
}