<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    // Global scope untuk membatasi data berdasarkan role user || Personal data untuk User dan Admin can see anything
    protected static function booted()
{
    static::addGlobalScope('ownedByRole', function ($builder) {
        if (auth()->check()) {
            $user = auth()->user();

            // Panggil function isAdmin() yang sudah Anda buat di model User
            if (! $user->isAdmin()) {
                $builder->where('id_user', $user->id);
            }

            // Jika isAdmin() bernilai true, query WHERE tidak akan dijalankan
            // sehingga Admin bisa melihat semua data.
        }
    });
}
}
