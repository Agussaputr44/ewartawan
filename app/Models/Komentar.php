<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'komentar';

    protected $primaryKey = 'id_komentar';

    protected $fillable = [
        'id_user',
        'isi_komentar',
        'status_komentar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
