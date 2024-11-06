<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinations extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'long',
        'lat',
        'link',
        'image',
        'slug',
        'excerpt',
        'description',
    ];

    public function order() {
        return $this->hasMany(Orders::class, 'destination_id');
    }

    public function drop_point() {
        return $this->hasMany(Drop_points::class, 'destination_id');
    }

}
