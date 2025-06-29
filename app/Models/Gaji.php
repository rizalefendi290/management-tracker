<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'gaji_pokok',
        'tunjangan',
        'potongan',
        'total',
        'tanggal',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}