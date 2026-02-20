

<details>
<summary>Semua Field</summary>

>Beberapa Masalah Yang dialami sebelumnya dan teratasi dengan mempelajari :
    
```
Tipe data
Tipe Column
Column Modifier
```



>User (Field) : 
```
            $table->id();
            $table->string('name');
            $table->string('nis')->nullable()->unique();
            $table->string('role')->default('siswa');
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
```

>Kategori (Field) : 
```
            $table->id("id_kategori");
            $table->string("ket_kategori");
            $table->timestamps();
```

>Aspirasi (Field) :
```
            $table->id('id_aspirasi');
            $table->foreignId('id_kategori')->constrained('kategoris', 'id_kategori')->onDelete('cascade');
            $table->foreignId('id_user')->constrained('users', 'id')->onDelete('cascade');
            $table->string('judul',100);
            $table->enum('status', ['Menunggu', 'Proses', 'Selesai'])->default('Menunggu')->nullable();
            //feedback jangan string ngawur malah erro ubah text aduhai
            $table->text('feedback')->nullable();
            $table->text('keterangan');
            $table->string('foto')->nullable();
            $table->string('lokasi')->nullable();
            $table->timestamps();
```
</details>

<details>
    <summary>
        Bagaimana Cara Rolenya Bekerja
    </summary>
</details>
