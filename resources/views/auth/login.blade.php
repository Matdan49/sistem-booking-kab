<x-guest-layout>
    <div class="w-full sm:max-w-md my-6 px-8 py-10 bg-white shadow-2xl overflow-hidden sm:rounded-2xl border border-gray-100 mx-auto">
        
        <div class="mb-8 text-center">
            <div class="inline-flex p-3 bg-blue-100 text-blue-600 rounded-2xl mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 tracking-tight">Log Masuk Sistem</h2>
            <p class="text-sm text-gray-500 mt-1">Tempahan Fasiliti Kolej Kediaman Aminuddin Baki</p>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            {{-- Ruangan Email --}}
            <div>
                <x-input-label for="email" :value="__('Alamat Emel / ID Pengguna')" class="text-gray-700 font-semibold mb-1" />
                <x-text-input id="email" 
                    class="block mt-1 w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 text-gray-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 shadow-sm" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autofocus 
                    autocomplete="username" 
                    placeholder="contoh@siswa.ukm.edu.my" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs" />
            </div>

            {{-- Ruangan Password --}}
            <div>
                <div class="flex items-center justify-between mb-1">
                    <x-input-label for="password" :value="__('Kata Laluan')" class="text-gray-700 font-semibold" />
                    
                    @if (Route::has('password.request'))
                        <a class="text-xs text-blue-600 hover:text-blue-800 hover:underline transition duration-150" href="{{ route('password.request') }}">
                            {{ __('Lupa kata laluan?') }}
                        </a>
                    @endif
                </div>

                <x-text-input id="password" 
                    class="block mt-1 w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 text-gray-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 shadow-sm"
                    type="password"
                    name="password"
                    required 
                    autocomplete="current-password" 
                    placeholder="••••••••" />

                <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs" />
            </div>

            {{-- Dropdown Pemilihan Role (Peranan) --}}
            <div>
                <x-input-label for="role" :value="__('Log Masuk Sebagai (Peranan)')" class="text-gray-700 font-semibold mb-1" />
                <select id="role" name="role" 
                    class="block mt-1 w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 text-gray-800 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 shadow-sm font-medium" 
                    required>
                    <option value="" disabled {{ old('role') ? '' : 'selected' }}>-- Sila Pilih Peranan Anda --</option>
                    <option value="student" {{ old('role') === 'student' ? 'selected' : '' }}>Pelajar (Student)</option>
                    <option value="non-student" {{ old('role') === 'non-student' ? 'selected' : '' }}>Bukan Pelajar (Non-Student/Staf)</option>
                    <option value="pejabat" {{ old('role') === 'pejabat' ? 'selected' : '' }}>Pentadbir Pejabat</option>
                    <option value="pengetua" {{ old('role') === 'pengetua' ? 'selected' : '' }}>Pengetua Kolej</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2 text-xs" />
            </div>

            {{-- Ruangan Remember Me --}}
            <div class="flex items-center justify-between pt-1">
                <label for="remember_me" class="inline-flex items-center cursor-pointer">
                    <input id="remember_me" type="checkbox" class="rounded-lg border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 focus:ring-offset-0 w-4 h-4" name="remember">
                    <span class="ms-2 text-sm text-gray-600 selection:bg-transparent">{{ __('Ingat sesi saya') }}</span>
                </label>
            </div>

            {{-- Bahagian Butang Hantar --}}
            <div class="pt-2 space-y-4">
                <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-xl shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition duration-200 text-center justify-center flex items-center gap-2">
                    <span>Masuk ke Dashboard</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>

                {{-- 🚀 PASAK PINTAS LOG MASUK (TRIAL MODE) --}}
                <div class="pt-4 border-t border-dashed border-gray-200">
                    <p class="text-xs text-center font-bold text-gray-400 uppercase tracking-wider mb-3">
                        ⚡ Log Masuk Segera (Ujian/Trial)
                    </p>
                    
                    <div class="grid grid-cols-2 gap-3 text-center">
                        <a href="{{ route('login.quick', 'student') }}" 
                           class="px-4 py-2 bg-blue-50 hover:bg-blue-100 text-blue-700 text-xs font-bold rounded-xl border border-blue-200 transition duration-150 block">
                           👨‍🎓 Student
                        </a>

                        <a href="{{ route('login.quick', 'non-student') }}" 
                           class="px-4 py-2 bg-teal-50 hover:bg-teal-100 text-teal-700 text-xs font-bold rounded-xl border border-teal-200 transition duration-150 block">
                           👤 Non-Student
                        </a>

                        <a href="{{ route('login.quick', 'pejabat') }}" 
                           class="px-4 py-2 bg-amber-50 hover:bg-amber-100 text-amber-700 text-xs font-bold rounded-xl border border-amber-200 transition duration-150 block">
                           🏢 Pejabat
                        </a>

                        <a href="{{ route('login.quick', 'pengetua') }}" 
                           class="px-4 py-2 bg-purple-50 hover:bg-purple-100 text-purple-700 text-xs font-bold rounded-xl border border-purple-200 transition duration-150 block">
                           🎓 Pengetua
                        </a>
                    </div>
                </div>

                @if (Route::has('register'))
                    <div class="text-center text-sm text-gray-600 pt-2 border-t border-gray-100">
                        Belum mempunyai akaun? 
                        <a href="{{ route('register') }}" class="font-semibold text-blue-600 hover:text-blue-800 hover:underline transition duration-150">
                            Daftar Akaun Baru
                        </a>
                    </div>
                @endif
            </div>
        </form>

    </div>
</x-guest-layout>