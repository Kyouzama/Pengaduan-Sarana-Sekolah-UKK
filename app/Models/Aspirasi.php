<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $table = 'aspirasis';
    protected $primaryKey = 'id_aspirasi';
    protected $guarded = [];

    public function user()
    {
        // Hubungkan ke model User menggunakan id_user sebagai foreign key
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function kategori()
    {
        // Hubungkan ke model Kategori menggunakan id_kategori sebagai foreign key
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
