<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
    
    protected $table = 'notifications';

    // ...

    public function notifiable()
    {
        return $this->morphTo();
    }
}
