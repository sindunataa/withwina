<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drop_points extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'long',
        'lat',
        'link',
        'destination_id',
        'image',
    ];

    public function order() {
        return $this->hasMany(Orders::class, 'drop_point_id');
    }

    public function destination() {
        return $this->belongsTo(Destinations::class);
    }
}
