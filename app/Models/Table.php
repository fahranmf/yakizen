<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Table extends Model
{
    protected $fillable = ['table_number', 'status'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

     public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public function isAvailable()
    {
        return $this->status === 'available';
    }

    /**
     * Reserve table safely (with race condition protection)
     */
    public function reserve(): bool
    {
        return DB::transaction(function () {
            $affected = DB::table('tables')
                ->where('id', $this->id)
                ->where('status', 'available')
                ->update([
                    'status' => 'reserved',
                    'updated_at' => now(),
                ]);

            return $affected > 0;
        });
    }
}
