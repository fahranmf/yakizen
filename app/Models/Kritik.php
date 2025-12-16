<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kritik extends Model
{
    protected $fillable = ['user_id', 'pesan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
