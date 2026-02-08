<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aspirasi Sekolah</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        // Palet Hitam Xeno
                        background: '#030303',
                        surface: '#0A0A0A',
                        border: '#1F1F1F',
                    },
                    animation: {
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #030303;
            color: #ffffff;
        }

        /* 1. Grid Background Effect */
        .bg-grid {
            background-size: 40px 40px;
            background-image: linear-gradient(to right, #1a1a1a 1px, transparent 1px),
                              linear-gradient(to bottom, #1a1a1a 1px, transparent 1px);
            mask-image: radial-gradient(ellipse at center, black 40%, transparent 80%);
            -webkit-mask-image: radial-gradient(ellipse at center, black 40%, transparent 80%);
        }

        /* 2. Spotlight / Glow Effect */
        .spotlight {
            background: radial-gradient(circle at center, rgba(56, 189, 248, 0.15) 0%, rgba(0, 0, 0, 0) 70%);
        }

        /* 3. Glass/Bento Card */
        .bento-card {
            background: rgba(10, 10, 10, 0.6);
            border: 1px solid #1F1F1F;
            backdrop-filter: blur(8px);
            transition: all 0.3s ease;
        }

        .bento-card:hover {
            border-color: #333;
            background: rgba(15, 15, 15, 0.8);
            transform: translateY(-2px);
        }

        /* Text Gradient */
        .text-gradient {
            background: linear-gradient(to right, #fff, #a1a1aa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="antialiased min-h-screen relative overflow-x-hidden selection:bg-white/20">

    <div class="fixed inset-0 z-0 bg-grid pointer-events-none"></div>
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-[800px] h-[500px] spotlight z-0 pointer-events-none blur-3xl"></div>

    <nav class="fixed w-full z-50 top-0 border-b border-white/5 bg-black/50 backdrop-blur-md">
        <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 bg-white rounded-full flex items-center justify-center">
                    <svg class="w-4 h-4 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span class="font-semibold text-sm tracking-wide">SaranaSekolah</span>
            </div>

            <div class="flex items-center gap-4">
                @auth
                    <a href="/siswa" class="text-sm text-gray-400 hover:text-white transition">Dashboard</a>
                @else
                    <a href="/siswa/login" class="group relative px-4 py-2 rounded-full bg-white text-black text-sm font-semibold hover:bg-gray-200 transition overflow-hidden">
                        <span class="relative z-10">Login Siswa</span>
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="relative z-10 pt-32 pb-20 max-w-6xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-20">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-white/10 bg-white/5 text-xs text-gray-400 mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                Sistem Online v2.0
            </div>

            <h1 class="text-5xl md:text-7xl font-bold tracking-tight mb-6 text-gradient">
                Aspirasi Anda,<br>Sekolah Lebih Baik.
            </h1>

            <p class="text-lg text-gray-500 mb-8 leading-relaxed max-w-xl mx-auto">
                Platform modern untuk melaporkan kerusakan sarana dan prasarana sekolah secara transparan, cepat, dan terukur.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="/siswa/login" class="w-full sm:w-auto px-8 py-3.5 rounded-lg bg-white text-black font-semibold hover:bg-gray-200 transition shadow-[0_0_20px_rgba(255,255,255,0.1)]">
                    Buat Laporan
                </a>
                <a href="#fitur" class="w-full sm:w-auto px-8 py-3.5 rounded-lg border border-white/10 text-gray-300 hover:bg-white/5 transition">
                    Pelajari Alur
                </a>
            </div>
        </div>

        <div id="fitur" class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="bento-card md:col-span-2 p-8 rounded-2xl relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl -mr-16 -mt-16 transition group-hover:bg-blue-500/20"></div>
                <div class="relative z-10">
                    <div class="w-10 h-10 rounded-lg border border-white/10 bg-white/5 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-white">Laporan Terpusat</h3>
                    <p class="text-gray-400 text-sm leading-relaxed max-w-md">
                        Tidak perlu lagi mencari guru piket. Cukup login, foto kerusakan, dan kirim. Semua data tersimpan rapi di database sekolah.
                    </p>
                </div>
            </div>

            <div class="bento-card p-8 rounded-2xl relative overflow-hidden group">
                <div class="absolute bottom-0 left-0 w-full h-1/2 bg-gradient-to-t from-black/50 to-transparent"></div>
                <div class="w-10 h-10 rounded-lg border border-white/10 bg-white/5 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2 text-white">Privasi Aman</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Data siswa terlindungi. Siswa lain tidak bisa mengintip laporan yang Anda kirimkan.
                </p>
            </div>

            <div class="bento-card p-8 rounded-2xl">
                <h3 class="text-3xl font-bold text-white mb-1">24<span class="text-blue-500 text-lg">jam</span></h3>
                <p class="text-gray-500 text-xs uppercase tracking-wider font-medium">Waktu Respon</p>
            </div>

            <div class="bento-card md:col-span-2 p-8 rounded-2xl flex items-center justify-between group">
                <div>
                    <h3 class="text-xl font-semibold mb-1 text-white">Transparansi Proses</h3>
                    <p class="text-gray-400 text-sm">Pantau status: Pending &rarr; Diproses &rarr; Selesai.</p>
                </div>
                <div class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center group-hover:bg-white group-hover:text-black transition-all">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </div>
            </div>

        </div>

    </main>

    <footer class="border-t border-white/5 mt-20 py-10">
        <div class="max-w-6xl mx-auto px-6 flex justify-between items-center text-xs text-gray-600">
            <p>&copy; 2026 SaranaSekolah. All rights reserved.</p>
            <div class="flex gap-4">
                <a href="#" class="hover:text-gray-400">Privacy</a>
                <a href="#" class="hover:text-gray-400">Terms</a>
            </div>
        </div>
    </footer>

</body>
</html>
