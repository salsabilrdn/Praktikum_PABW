<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Lowongan;


class Lamaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lowongan_id',
        'deskripsi_lamaran',
        'cv_file',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function lowongan()
{
    return $this->belongsTo(Lowongan::class);
}

}
