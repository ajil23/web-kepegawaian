<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    
    protected $table = 'users';

    protected $fillable = [
        'name',
        'nip',
        'email',
        'password',
        'role',
        'status_akun',
        'catatan_verifikasi',
    ];

    public function riwayatKepegawaian()
    {
        return $this->hasMany(RiwayatKepegawaian::class, 'user_id');
    }
}
