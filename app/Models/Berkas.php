<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    protected $fillable = ['user_id', 'nama_berkas', 'file_path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
