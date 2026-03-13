<section>
    <header class="border-b border-gray-700 pb-4 mb-6 relative">
        <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-500 uppercase tracking-widest font-mono">
            {{ __('Encryption Key / Passphrase') }}
        </h2>

        <p class="mt-2 text-sm text-gray-400 font-mono">
            {{ __('Ensure your access node is shielded with a high-entropy passphrase.') }}
        </p>
        <div class="absolute bottom-0 left-0 h-[1px] w-1/3 bg-pink-500 shadow-[0_0_10px_rgba(236,72,153,0.8)]"></div>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" class="text-purple-400 font-bold uppercase tracking-wide font-mono mb-2"><i class="fa-solid fa-unlock-keyhole mr-2"></i>{{ __('Legacy Passphrase') }}</x-input-label>
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full bg-gray-900 border-gray-700 text-purple-300 focus:border-pink-500 focus:ring-pink-500 font-mono rounded-lg transition-all" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-pink-500" />
        </div>

        <div>
            <x-input-label for="update_password_password" class="text-pink-400 font-bold uppercase tracking-wide font-mono mb-2"><i class="fa-solid fa-key mr-2"></i>{{ __('New Passphrase') }}</x-input-label>
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full bg-gray-900 border-gray-700 text-pink-300 focus:border-cyan-500 focus:ring-cyan-500 font-mono rounded-lg transition-all" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-pink-500" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" class="text-cyan-400 font-bold uppercase tracking-wide font-mono mb-2"><i class="fa-solid fa-shield-halved mr-2"></i>{{ __('Verify Passphrase') }}</x-input-label>
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full bg-gray-900 border-gray-700 text-cyan-300 focus:border-pink-500 focus:ring-pink-500 font-mono rounded-lg transition-all" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-pink-500" />
        </div>

        <div class="flex items-center gap-6 pt-4 border-t border-gray-700">
            <button class="bg-gradient-to-r from-pink-500 to-purple-500 hover:from-purple-500 hover:to-pink-500 text-white font-bold py-2.5 px-8 rounded-lg shadow-[0_0_15px_rgba(236,72,153,0.4)] transition-all transform hover:scale-105 uppercase tracking-widest text-sm flex items-center gap-2">
                <i class="fa-solid fa-lock"></i> {{ __('Rotate Keys') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="text-sm text-pink-400 font-bold font-mono animate-pulse"
                ><i class="fa-solid fa-shield-check mr-1"></i> {{ __('KEYS ROTATED.') }}</p>
            @endif
        </div>
    </form>
</section>
