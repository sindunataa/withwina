<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Kusirs extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'weight',
        'max',
        'cost',
        'max_person',
        'status',
        'image',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function order() {
        return $this->hasMany(Orders::class, 'kusir_id');
    }



    // ...

    /**
     * Dapatkan alamat email notifikasi.
     *
     * @return string
     */
}
