<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Import model User
use App\Models\User; 

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['task', 'is_completed', 'user_id'];

    // --- TAMBAHKAN KODE INI ---
    /**
     * Relasi ke model User (Setiap Todo dimiliki oleh satu User)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // --------------------------
}