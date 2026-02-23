> [!NOTE]
> **Bagaimana Cara Kerja Role**
>
> - Menambahkan Checkrole Pada Middleware
> - Menambahkan Alias Pada Boostrap/app.php
> - Memberikan Hak Akses Role Pada Panel Yang Di-inginkan Pada  Providers

> [!Note]
> **Baaiamana Cara Kerja Relasi & Primary Key**
>
>  Note : Jika Primary Key Wajib Menambahkan Di Model
> 
> ```
> protected $primaryKey = 'id_kategoris';
> ```
> 
> 
> - Membuat Table Biasa Yang Akan Ditambahkan Pada Table Berikutnya
>   
> **Contohnya : Table Pertama kategori (id_kategori,ket_kategori), Table Kedua Aspirasi (id_kategori,judul,feedback) Untuk Bisa Di Relasikan Kita Butuh Column Modifier yaitu dengan foreignId ( sebagai id ), constrained ( check data ),onDelete ( Untuk Hapus )**
>
> - Lalu Mendaftarkanya Di Model
> ```
> public function kategori() {
> return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
>}
> ```
> 




<details>
<summary>Semua Field</summary>
<br>
    
>Beberapa Masalah Yang dialami sebelumnya dan teratasi dengan mempelajari :
    
```
Tipe Data
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
<summary>Role Code</summary>
<br>
    
>Middleware untuk checkrole
    
```
     public function handle(Request $request, Closure $next, string $role): Response
    {
        if(auth()->check() && auth()->user()->role !== $role) {
            abort(403, "Kamu tidak memeiliki akses ke halaman ini.");
        }
        return $next($request);
    }
 ```

>Tambahkan/Daftarkan Alias di ../bootstrap/app.php

```
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            "role" => CheckRole::class
        ]);

```

>Buat jenis rolenya di app/providers/filament/(Panel yang akan di beri rolenya contoh AdminPanelProvider)

```

->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                //untuk checkrolenya
                'role:admin'
            ])
```
</details>
