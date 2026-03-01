<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aspirasi Sekolah | Yellow Edition</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            yellow: '#FACC15', // Yellow-400
                            dark: '#111827',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #ffffff;
            color: #111827;
        }

        /* 1. Grid Background Effect (Light Mode) */
        .bg-grid {
            background-size: 40px 40px;
            background-image: linear-gradient(to right, #f3f4f6 1px, transparent 1px),
                              linear-gradient(to bottom, #f3f4f6 1px, transparent 1px);
            mask-image: radial-gradient(ellipse at center, black 50%, transparent 90%);
            -webkit-mask-image: radial-gradient(ellipse at center, black 50%, transparent 90%);
        }

        /* 2. Spotlight / Glow Effect - Changed to Yellow */
        .spotlight {
            background: radial-gradient(circle at center, rgba(250, 204, 21, 0.1) 0%, rgba(255, 255, 255, 0) 70%);
        }

        /* 3. Bento Card - Light Theme */
        .bento-card {
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid #e5e7eb;
            backdrop-filter: blur(10px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .bento-card:hover {
            border-color: #FACC15;
            background: #ffffff;
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
        }

        /* Text Gradient - Yellow to Dark */
        .text-gradient {
            background: linear-gradient(to right, #111827, #854d0e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-yellow {
            background-color: #FACC15;
            color: #000;
            transition: all 0.3s ease;
        }

        .btn-yellow:hover {
            background-color: #eab308;
            box-shadow: 0 10px 15px -3px rgba(250, 204, 21, 0.3);
        }
    </style>
</head>
<body class="antialiased min-h-screen relative overflow-x-hidden selection:bg-yellow-200">

    <div class="fixed inset-0 z-0 bg-grid pointer-events-none"></div>
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[600px] spotlight z-0 pointer-events-none blur-3xl"></div>

    <nav class="fixed w-full z-50 top-0 border-b border-gray-100 bg-white/70 backdrop-blur-md">
        <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-brand-yellow rounded-lg flex items-center justify-center shadow-sm">
                    <svg class="w-5 h-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span class="font-bold text-lg tracking-tight text-gray-900">Sarana<span class="text-yellow-500">Sekolah</span></span>
            </div>

            <div class="flex items-center gap-6">
                @auth
                    <a href="/siswa" class="text-sm font-medium text-gray-600 hover:text-yellow-600 transition">Dashboard</a>
                @else
                    <a href="/siswa/login" class="text-sm font-medium text-gray-600 hover:text-yellow-600 transition">Masuk</a>
                    <a href="/siswa/login" class="px-5 py-2 rounded-full btn-yellow text-sm font-bold">
                        Daftar Laporan
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="relative z-10 pt-32 pb-20 max-w-6xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-20">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-yellow-200 bg-yellow-50 text-xs font-semibold text-yellow-700 mb-6">
                <span class="w-2 h-2 rounded-full bg-yellow-500 animate-pulse"></span>
                Sistem Online v2.0 • 2026
            </div>

            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight mb-6 text-gradient">
                Aspirasi Anda,<br><span class="text-yellow-500">Sekolah</span> Lebih Baik.
            </h1>

            <p class="text-lg text-gray-600 mb-10 leading-relaxed max-w-xl mx-auto">
                Platform modern untuk melaporkan kerusakan sarana sekolah secara transparan, cepat, dan terukur demi kenyamanan belajar.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="/siswa/login" class="w-full sm:w-auto px-10 py-4 rounded-xl btn-yellow font-bold text-lg shadow-lg">
                    Buat Laporan Sekarang
                </a>
                <a href="#fitur" class="w-full sm:w-auto px-10 py-4 rounded-xl border border-gray-200 text-gray-700 font-semibold hover:bg-gray-50 transition">
                    Pelajari Alur
                </a>
            </div>
        </div>

        <div id="fitur" class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="bento-card md:col-span-2 p-8 rounded-3xl relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-64 h-64 bg-yellow-400/10 rounded-full blur-3xl -mr-16 -mt-16 transition group-hover:bg-yellow-400/20"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 rounded-xl bg-yellow-100 flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3 text-gray-900">Laporan Terpusat</h3>
                    <p class="text-gray-600 leading-relaxed max-w-md">
                        Tidak perlu lagi mencari guru piket. Cukup login, foto kerusakan, dan kirim. Semua data tersimpan rapi dan langsung diverifikasi.
                    </p>
                </div>
            </div>

            <div class="bento-card p-8 rounded-3xl relative overflow-hidden group">
                <div class="w-12 h-12 rounded-xl bg-yellow-100 flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-3 text-gray-900">Privasi Aman</h3>
                <p class="text-gray-600 leading-relaxed">
                    Data siswa terlindungi sepenuhnya. Identitas Anda aman dalam sistem enkripsi kami.
                </p>
            </div>

            <div class="bento-card p-8 rounded-3xl flex flex-col justify-center items-center text-center group">
                <h3 class="text-5xl font-black text-gray-900 mb-1">24<span class="text-yellow-500 text-2xl">Jam</span></h3>
                <p class="text-gray-500 text-xs uppercase tracking-[0.2em] font-bold">Respon Cepat</p>
            </div>

            <div class="bento-card md:col-span-2 p-8 rounded-3xl flex items-center justify-between group">
                <div>
                    <h3 class="text-2xl font-bold mb-2 text-gray-900">Transparansi Proses</h3>
                    <p class="text-gray-600">Pantau status laporan secara real-time dari gadget Anda.</p>
                </div>
                <div class="w-14 h-14 rounded-full border border-gray-200 flex items-center justify-center group-hover:bg-yellow-400 group-hover:border-yellow-400 group-hover:text-black transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </div>
            </div>

        </div>
    </main>

    <footer class="border-t border-gray-100 mt-20 py-12 bg-gray-50/50">
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6 text-sm text-gray-500">
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 bg-gray-200 rounded flex items-center justify-center">
                    <div class="w-3 h-3 bg-gray-400 rounded-sm"></div>
                </div>
                <p class="font-medium">&copy; 2026 SaranaSekolah. Hak Cipta Dilindungi.</p>
            </div>
            <div class="flex gap-8 font-medium">
                <a href="#" class="hover:text-yellow-600 transition">Kebijakan Privasi</a>
                <a href="#" class="hover:text-yellow-600 transition">Bantuan</a>
            </div>
        </div>
    </footer>

</body>
</html>
