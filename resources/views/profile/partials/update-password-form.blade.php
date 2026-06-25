<section class="bg-[#fbf9f4]/80 backdrop-blur-md border border-white/40 shadow-[0_30px_60px_-15px_rgba(0,0,0,0.3)] rounded-[2rem] overflow-hidden transition-all duration-300 hover:shadow-[0_30px_50px_rgba(245,158,11,0.15)]">
    
    {{-- HEADER INTERNAL KAD: PREMIUM GRADIENT BANNER SECURITY STYLE --}}
    <div class="p-6 sm:p-8 border-b border-slate-900/10 bg-gradient-to-r from-amber-500/10 via-orange-500/5 to-transparent relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-amber-500/5 to-transparent opacity-50 pointer-events-none"></div>
        
        <h2 class="text-base font-black text-slate-800 tracking-wider flex items-center gap-3 uppercase relative z-10">
            <div class="p-2.5 bg-slate-900 text-amber-400 rounded-xl border border-slate-700 shadow-md transform group-hover:rotate-6 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-slate-900 via-slate-700 to-slate-900 font-black">
                {{ __('Kemas Kini Kata Laluan') }}
            </span>
        </h2>
        <p class="text-slate-600 text-xs mt-2 font-semibold pl-11 relative z-10">
            {{ __('Pastikan akaun anda menggunakan kata laluan yang panjang dan rawak untuk keselamatan maksimum.') }}
        </p>
    </div>

    {{-- BORANG UTAMA TUKAR KATA LALUAN --}}
    <form method="post" action="{{ route('password.update') }}" class="p-6 sm:p-8 space-y-6">
        @csrf
        @method('put')

        {{-- KATA LALUAN SEMASA --}}
        <div>
            <label for="update_password_current_password" class="block text-xs font-black uppercase tracking-widest text-slate-700 mb-2 pl-1">
                {{ __('Kata Laluan Semasa') }}
            </label>
            <div class="relative rounded-xl shadow-sm group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-amber-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2v4a2 2 0 01-2 2H9a2 2 0 01-2-2V9a2 2 0 012-2m6 0V4a3 3 0 10-6 0v3m6 0H9" />
                    </svg>
                </div>
                <input id="update_password_current_password" name="current_password" type="password" 
                       class="w-full bg-white border border-slate-200 rounded-xl pl-11 pr-4 py-3.5 text-slate-800 font-bold focus:border-amber-500 focus:ring-4 focus:ring-amber-500/10 outline-none transition-all duration-200 text-sm shadow-inner" 
                       autocomplete="current-password" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-xs font-bold text-rose-600 pl-1" />
        </div>

        {{-- KATA LALUAN BAHARU --}}
        <div>
            <label for="update_password_password" class="block text-xs font-black uppercase tracking-widest text-slate-700 mb-2 pl-1">
                {{ __('Kata Laluan Baharu') }}
            </label>
            <div class="relative rounded-xl shadow-sm group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-amber-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m0 0v3m0-3h3m-3 0H9m12-4a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <input id="update_password_password" name="password" type="password" 
                       class="w-full bg-white border border-slate-200 rounded-xl pl-11 pr-4 py-3.5 text-slate-800 font-bold focus:border-amber-500 focus:ring-4 focus:ring-amber-500/10 outline-none transition-all duration-200 text-sm shadow-inner" 
                       autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-xs font-bold text-rose-600 pl-1" />
        </div>

        {{-- PENGESAHAN KATA LALUAN --}}
        <div>
            <label for="update_password_password_confirmation" class="block text-xs font-black uppercase tracking-widest text-slate-700 mb-2 pl-1">
                {{ __('Pengesahan Kata Laluan Baharu') }}
            </label>
            <div class="relative rounded-xl shadow-sm group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-amber-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                       class="w-full bg-white border border-slate-200 rounded-xl pl-11 pr-4 py-3.5 text-slate-800 font-bold focus:border-amber-500 focus:ring-4 focus:ring-amber-500/10 outline-none transition-all duration-200 text-sm shadow-inner" 
                       autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-xs font-bold text-rose-600 pl-1" />
        </div>

        {{-- BAHAGIAN BUTTON SIMPAN & NOTIFIKASI BERJAYA --}}
        <div class="flex items-center justify-between pt-6 border-t border-slate-900/10 mt-6 gap-4">
            
            <button type="submit" class="px-6 py-4 bg-gradient-to-r from-amber-500 via-orange-600 to-amber-600 hover:brightness-110 active:scale-[0.97] text-white text-xs font-black uppercase tracking-widest rounded-xl shadow-lg shadow-orange-600/20 transition-all duration-150 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/xl" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                {{ __('Kemas Kini Kata Laluan') }}
            </button>

            @if (session('status') === 'password-updated')
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
                    <span class="uppercase tracking-wider text-[11px]">{{ __('Kata Laluan Berjaya Ditukar!') }}</span>
                </div>
            @endif
        </div>
    </form>
</section>