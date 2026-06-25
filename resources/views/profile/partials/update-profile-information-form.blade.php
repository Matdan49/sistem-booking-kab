<section class="bg-[#fbf9f4]/80 backdrop-blur-md border border-white/40 shadow-[0_30px_60px_-15px_rgba(0,0,0,0.3)] rounded-[2rem] overflow-hidden transition-all duration-300 hover:shadow-[0_30px_50px_rgba(245,158,11,0.15)]">
    
    {{-- HEADER INTERNAL KAD: PREMIUM GRADIENT BANNER --}}
    <div class="p-6 sm:p-8 border-b border-slate-900/10 bg-gradient-to-r from-amber-500/10 via-orange-500/5 to-transparent relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-amber-500/5 to-transparent opacity-50 pointer-events-none"></div>
        
        <h2 class="text-base font-black text-slate-800 tracking-wider flex items-center gap-3 uppercase relative z-10">
            <div class="p-2.5 bg-slate-900 text-amber-400 rounded-xl border border-slate-700 shadow-md transform group-hover:rotate-6 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-slate-900 via-slate-700 to-slate-900 font-black">
                {{ __('Maklumat Profil Akaun') }}
            </span>
        </h2>
        <p class="text-slate-600 text-xs mt-2 font-semibold pl-11 relative z-10">
            {{ __("Kemaskini maklumat profil akaun anda dan alamat e-mel berdaftar sistem.") }}
        </p>
    </div>

    {{-- BORANG VERIFIKASI SEBELUM KEMASKINI --}}
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- BORANG UTAMA KEMASKINI PROFIL --}}
    <form method="post" action="{{ route('profile.update') }}" class="p-6 sm:p-8 space-y-6">
        @csrf
        @method('patch')

        {{-- INPUT NAMA --}}
        <div>
            <label for="name" class="block text-xs font-black uppercase tracking-widest text-slate-700 mb-2 pl-1">
                {{ __('Nama Penuh Anda') }}
            </label>
            <div class="relative rounded-xl shadow-sm group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-amber-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <input id="name" name="name" type="text" 
                       class="w-full bg-white border border-slate-200 rounded-xl pl-11 pr-4 py-3.5 text-slate-800 font-bold focus:border-amber-500 focus:ring-4 focus:ring-amber-500/10 outline-none transition-all duration-200 text-sm shadow-inner" 
                       value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            </div>
            <x-input-error class="mt-2 text-xs font-bold text-rose-600 pl-1" :messages="$errors->get('name')" />
        </div>

        {{-- INPUT EMEL --}}
        <div>
            <label for="email" class="block text-xs font-black uppercase tracking-widest text-slate-700 mb-2 pl-1">
                {{ __('Alamat E-mel Rasmi') }}
            </label>
            <div class="relative rounded-xl shadow-sm group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-amber-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L23 8M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z" />
                    </svg>
                </div>
                <input id="email" name="email" type="email" 
                       class="w-full bg-white border border-slate-200 rounded-xl pl-11 pr-4 py-3.5 text-slate-800 font-bold focus:border-amber-500 focus:ring-4 focus:ring-amber-500/10 outline-none transition-all duration-200 text-sm shadow-inner" 
                       value="{{ old('email', $user->email) }}" required autocomplete="username" />
            </div>
            <x-input-error class="mt-2 text-xs font-bold text-rose-600 pl-1" :messages="$errors->get('email')" />

            {{-- JIKA EMEL BELUM DI-VERIFIKASI --}}
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 p-4 bg-gradient-to-r from-amber-500/10 to-orange-500/5 border border-amber-500/20 rounded-xl flex items-start gap-3 shadow-sm animate-bounce-short">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <div>
                        <p class="text-xs font-bold text-amber-900 leading-relaxed">
                            {{ __('Alamat e-mel anda masih belum disahkan oleh sistem.') }}
                            <button form="send-verification" class="underline font-black text-orange-600 hover:text-orange-700 transition block mt-1.5 text-[11px] uppercase tracking-wide">
                                {{ __('👉 Klik di sini untuk hantar semula e-mel pengesahan') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-black text-xs text-emerald-600 flex items-center gap-1 bg-emerald-500/10 p-2 rounded-lg border border-emerald-500/20">
                                <span>✨ {{ __('Pautan pengesahan baharu telah berjaya dihantar ke e-mel anda.') }}</span>
                            </p>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        {{-- BAHAGIAN BUTTON SIMPAN & NOTIFIKASI BERJAYA --}}
        <div class="flex items-center justify-between pt-6 border-t border-slate-900/10 mt-6 gap-4">
            
            <button type="submit" class="px-6 py-4 bg-gradient-to-r from-amber-500 via-orange-600 to-amber-600 hover:brightness-110 active:scale-[0.97] text-white text-xs font-black uppercase tracking-widest rounded-xl shadow-lg shadow-orange-600/20 transition-all duration-150 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                {{ __('Simpan Maklumat Profil') }}
            </button>

            @if (session('status') === 'profile-updated')
                <div x-data="{ show: true }"
                     x-show="show"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 transform translate-y-0"
                     x-transition:leave-end="opacity-0 transform translate-y-2"
                     x-init="setTimeout(() => show = false, 3000)"
                     class="flex items-center gap-2 text-xs font-black text-emerald-700 bg-emerald-500/15 border border-emerald-500/30 px-4 py-3 rounded-xl shadow-md">
                    <div class="p-1 bg-emerald-600 text-white rounded-md shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <span class="uppercase tracking-wider text-[11px]">{{ __('Profil Berjaya Disimpan!') }}</span>
                </div>
            @endif
        </div>
    </form>
</section>