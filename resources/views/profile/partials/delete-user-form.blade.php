<section class="bg-[#fbf9f4]/80 backdrop-blur-md border border-white/40 shadow-[0_30px_60px_-15px_rgba(0,0,0,0.3)] rounded-[2rem] overflow-hidden transition-all duration-300 hover:shadow-[0_30px_50px_rgba(225,29,72,0.15)]">
    
    {{-- HEADER INTERNAL KAD: DANGER RED / AMBER GRADIENT BANNER --}}
    <div class="p-6 sm:p-8 border-b border-slate-900/10 bg-gradient-to-r from-rose-500/10 via-orange-500/5 to-transparent relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-rose-500/5 to-transparent opacity-50 pointer-events-none"></div>
        
        <h2 class="text-base font-black text-slate-800 tracking-wider flex items-center gap-3 uppercase relative z-10">
            <div class="p-2.5 bg-slate-900 text-rose-500 rounded-xl border border-slate-700 shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-16v1a3 3 0 003 3h10M4 7h16" />
                </svg>
            </div>
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-slate-900 via-slate-700 to-slate-900 font-black">
                {{ __('Padam Akaun Pengguna') }}
            </span>
        </h2>
        <p class="text-slate-600 text-xs mt-2 font-semibold pl-11 relative z-10">
            {{ __('Setelah akaun anda dipadamkan, semua sumber dan data di dalamnya akan dibuang secara kekal. Sila muat turun maklumat penting terlebih dahulu.') }}
        </p>
    </div>

    {{-- KAWASAN BUTANG UTAMA --}}
    <div class="p-6 sm:p-8">
        <button 
            type="button"
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="px-6 py-4 bg-gradient-to-r from-rose-600 to-red-700 hover:brightness-110 active:scale-[0.97] text-white text-xs font-black uppercase tracking-widest rounded-xl shadow-lg shadow-rose-600/20 transition-all duration-150 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM9 14a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM21 12h-6" />
            </svg>
            {{ __('Padam Akaun Secara Kekal') }}
        </button>
    </div>

    {{-- MODAL PENGESAHAN (MODAL POPUP LUXURY COOPERATE) --}}
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 sm:p-8 bg-[#fbf9f4] border border-white/40 rounded-3xl">
            @csrf
            @method('delete')

            <h2 class="text-lg font-black text-slate-900 uppercase tracking-tight flex items-center gap-2">
                🛑 {{ __('Anda pasti mahu memadam akaun?') }}
            </h2>

            <p class="mt-3 text-xs text-slate-600 font-semibold leading-relaxed">
                {{ __('Sila masukkan kata laluan anda untuk mengesahkan bahawa anda mahu memadam akaun ini secara kekal daripada sistem e-Booking KAB.') }}
            </p>

            {{-- INPUT KATA LALUAN PENGESAHAN --}}
            <div class="mt-6">
                <label for="password" class="sr-only">{{ __('Kata Laluan') }}</label>
                <div class="relative rounded-xl shadow-sm max-w-md">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <input 
                        id="password"
                        name="password"
                        type="password"
                        class="w-full bg-white border border-slate-200 rounded-xl pl-11 pr-4 py-3.5 text-slate-800 font-bold focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10 outline-none transition-all duration-200 text-sm shadow-inner"
                        placeholder="{{ __('Sila Masukkan Kata Laluan Anda') }}"
                    />
                </div>
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-xs font-bold text-rose-600 pl-1" />
            </div>

            {{-- AKSI BUTANG MODAL --}}
            <div class="mt-8 flex justify-end gap-3 border-t border-slate-900/10 pt-4">
                <button 
                    type="button"
                    x-on:click="$dispatch('close')"
                    class="px-5 py-3 bg-slate-200 hover:bg-slate-300 text-slate-700 text-xs font-black uppercase tracking-widest rounded-xl transition duration-150">
                    {{ __('Batal') }}
                </button>

                <button 
                    type="submit"
                    class="px-5 py-3 bg-rose-600 hover:bg-rose-700 text-white text-xs font-black uppercase tracking-widest rounded-xl shadow-md transition duration-150">
                    {{ __('Ya, Padam Akaun') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>