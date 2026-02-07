<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{   
    //Tabel
    protected $table = "kategoris";
    //PrimaryKey untuk memberi tahu id yang akan di gunakan
    protected $primaryKey = "id_kategori";
    //Mengizin semua field tanpa perlu menggunakan $fillable
    protected $guarded = [];
}
