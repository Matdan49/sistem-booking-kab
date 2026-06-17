<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Fasiliti KAB - Intelligent Gallery Version</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @keyframes gradientBg {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .animate-gradient {
            background: linear-gradient(-45deg, #1e3a8a, #2563eb, #0284c7, #312e81);
            background-size: 400% 400%;
            animation: gradientBg 12s ease infinite;
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased" 
      x-data="{ 
        openModal: false, 
        selectedFacility: {},
        selectedSubCourt: {},
        facilities: [
            { 
                name: 'Dewan Utama KAB', 
                desc: 'Dewan besar untuk acara rasmi, peperiksaan, dan perhimpunan pelajar.',
                status: 'TERSEDIA',
                hasSubCourts: false,
                mainImage: 'https://images.unsplash.com/photo-1517457373958-b7bdd4587205?w=800',
                gallery: [
                    'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=500',
                    'https://images.unsplash.com/photo-1505236858219-8359eb29e329?w=500'
                ]
            },
            { 
                name: 'Bilik Seminar 1', 
                desc: 'Bilik mesyuarat selesa, lengkap dengan sistem projektor dan pendingin hawa.',
                status: 'TERSEDIA',
                hasSubCourts: false,
                mainImage: 'https://images.unsplash.com/photo-1544535830-9df5f4c0dd0a?w=800',
                gallery: [
                    'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=500',
                    'https://images.unsplash.com/photo-1524178232363-1fb28f74b671?w=500'
                ]
            },
            { 
                name: 'Gelanggang Sukan', 
                desc: 'Kompleks sukan KAB dengan 4 pilihan gelanggang spesifik.',
                status: 'TERSEDIA',
                hasSubCourts: true,
                mainImage: 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?w=800',
                subCourts: [
                    { name: 'Gelanggang Futsal', image: 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?w=800' },
                    { name: 'Gelanggang Takraw', image: 'https://images.unsplash.com/photo-1526232762682-d2f5f7144f26?w=800' },
                    { name: 'Gelanggang Badminton', image: 'https://images.unsplash.com/photo-1626224583764-f87db24ac4ea?w=800' },
                    { name: 'Gelanggang Bola Tampar', image: 'https://images.unsplash.com/photo-1592656094267-764a45160876?w=800' }
                ]
            }
        ]
      }">

    <nav class="sticky top-0 z-50 bg-slate-950/80 backdrop-blur-md border-b border-slate-800 p-4 shadow-xl">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-extrabold bg-gradient-to-r from-sky-400 to-indigo-400 bg-clip-text text-transparent">
                🔷 KAB HUB
            </h1>
            <span class="bg-blue-950/60 text-sky-300 border border-blue-800/60 px-4 py-1.5 rounded-full text-xs font-bold">
                AFIQ (Pro UI Developer)
            </span>
        </div>
    </nav>

    <header class="animate-gradient text-white py-14 px-6 shadow-xl relative text-center">
        <span class="bg-white/10 backdrop-blur-md text-sky-200 text-xs font-semibold uppercase tracking-widest px-4 py-1.5 rounded-full border border-white/5 mb-4 inline-block">
            Intelligent Booking Experience ⚡
        </span>
        <h2 class="text-4xl md:text-5xl font-black">Fasiliti Kolej Aminuddin Baki</h2>
        <p class="text-sky-100/70 mt-3 font-light">Klik mana-mana kad untuk melihat visual sebenar dan memilih slot tempahan.</p>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <template x-for="facility in facilities" :key="facility.name">
                <div @click="selectedFacility = facility; openModal = true; if(facility.hasSubCourts) { selectedSubCourt = facility.subCourts[0] }" 
                     class="group bg-slate-900 rounded-3xl overflow-hidden border border-slate-800 shadow-lg hover:border-sky-500/50 hover:shadow-sky-500/10 transform hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                    
                    <div class="h-48 overflow-hidden relative">
                        <img :src="facility.mainImage" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent text-transparent opacity-60"></div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-100 group-hover:text-sky-400 transition" x-text="facility.name"></h3>
                        <p class="text-slate-400 text-sm mt-2 font-light leading-relaxed mb-6" x-text="facility.desc"></p>
                        
                        <div class="flex justify-between items-center pt-4 border-t border-slate-800/80">
                            <span class="text-emerald-400 font-semibold text-xs flex items-center gap-1.5 bg-emerald-950/40 border border-emerald-900/50 px-2.5 py-1 rounded-full">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                                </span>
                                TERSEDIA
                            </span>
                            <span class="text-xs text-slate-500 group-hover:text-sky-400 font-medium transition flex items-center gap-1">
                                Tempah Sekarang ➡️
                            </span>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </main>

    <div x-show="openModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm" x-transition>
        <div @click.away="openModal = false" class="bg-slate-900 border border-slate-800 rounded-3xl p-6 md:p-10 max-w-5xl w-full max-h-[90vh] overflow-y-auto shadow-2xl">
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                
                <div class="space-y-4">
                    <div class="relative group">
                        <img :src="selectedFacility.hasSubCourts ? selectedSubCourt.image : selectedFacility.mainImage" 
                             class="w-full h-80 object-cover rounded-3xl shadow-2xl border border-slate-700 transition-all duration-500">
                        <div class="absolute bottom-4 left-4 bg-black/50 backdrop-blur-md px-4 py-2 rounded-2xl border border-white/10">
                            <p class="text-white text-sm font-bold flex items-center gap-2">
                                📸 Visual: <span class="text-sky-400" x-text="selectedFacility.hasSubCourts ? selectedSubCourt.name : selectedFacility.name"></span>
                            </p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-4 gap-2" x-show="!selectedFacility.hasSubCourts">
                        <img :src="selectedFacility.mainImage" class="h-20 w-full object-cover rounded-xl border-2 border-sky-500">
                        <template x-for="img in selectedFacility.gallery">
                            <img :src="img" class="h-20 w-full object-cover rounded-xl border border-slate-800 opacity-60 hover:opacity-100 transition cursor-pointer">
                        </template>
                    </div>
                </div>
                
                <div class="flex flex-col">
                    <h3 class="text-3xl font-black text-slate-100 mb-2" x-text="selectedFacility.name"></h3>
                    <p class="text-slate-400 text-sm mb-6 font-light italic">Sila lengkapkan butiran slot di bawah untuk pengesahan Admin.</p>
                    
                    <div class="space-y-5">
                        <template x-if="selectedFacility.hasSubCourts">
                            <div class="bg-slate-950/50 p-4 rounded-2xl border border-slate-800">
                                <label class="block text-xs font-black text-sky-400 uppercase tracking-widest mb-3">Pilih Jenis Gelanggang:</label>
                                <div class="grid grid-cols-2 gap-2">
                                    <template x-for="court in selectedFacility.subCourts" :key="court.name">
                                        <button @click="selectedSubCourt = court"
                                                :class="selectedSubCourt.name === court.name ? 'bg-sky-600 text-white border-sky-400 shadow-lg shadow-sky-900/40' : 'bg-slate-900 text-slate-400 border-slate-800 hover:border-slate-700'"
                                                class="border px-3 py-3 rounded-xl text-xs font-bold transition-all duration-300 text-left flex justify-between items-center">
                                            <span x-text="court.name"></span>
                                            <span x-show="selectedSubCourt.name === court.name" class="animate-pulse">📍</span>
                                        </button>
                                    </template>
                                </div>
                            </div>
                        </template>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1.5 uppercase">Tarikh</label>
                                <input type="date" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white focus:border-sky-500 outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1.5 uppercase">Tujuan</label>
                                <input type="text" placeholder="Contoh: Latihan" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white focus:border-sky-500 outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1.5 uppercase">Jam Mula</label>
                                <input type="time" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white focus:border-sky-500 outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1.5 uppercase">Jam Tamat</label>
                                <input type="time" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white focus:border-sky-500 outline-none">
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 flex gap-4">
                        <button @click="openModal = false" class="w-1/3 bg-slate-800 text-slate-400 font-bold py-4 rounded-2xl hover:bg-slate-700 transition duration-300 text-sm tracking-wide">Batal</button>
                        <button @click="alert('Tempahan dihantar untuk ' + (selectedFacility.hasSubCourts ? selectedSubCourt.name : selectedFacility.name)); openModal = false" 
                                class="w-2/3 bg-gradient-to-r from-sky-600 to-indigo-600 text-white font-black py-4 rounded-2xl shadow-xl shadow-sky-950 transition hover:scale-[1.02] active:scale-95 text-sm tracking-wider uppercase">
                            Sahkan Tempahan 🚀
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>