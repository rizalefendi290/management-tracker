<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'alamat',
        'no_hp', // Perhatikan: di migration ada 'no_hp', di controller ada 'no_telp'
        'tempat_lahir', // Perhatikan: di migration ada 'tempat_lahir', di controller ada 'tempat_lahir'
        'tanggal_lahir', // Perhatikan: di migration ada 'tgl_lahir', di controller ada 'tanggal_lahir'
        'jenis_kelamin',
        'foto',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}