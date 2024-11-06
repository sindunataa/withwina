<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'name',
        'weight',
        'max',
        'distance',
        'cost',
        'total',
        'status',
        'drop_point_id',
        'kusir_id',
        'destination_id',
        'user_id',
    ];

    public function kusir()
    {
        return $this->belongsTo(Kusirs::class);
    }

    public function drop_point()
    {
        return $this->belongsTo(Drop_points::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destinations::class);
    }

        public function user()
    {
        return $this->belongsTo(User::class);
    }
}
