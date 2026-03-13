<section class="space-y-6">
    <header class="border-b border-red-500/50 pb-4 relative">
        <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-pink-500 uppercase tracking-widest font-mono">
            {{ __('SYSTEM PURGE (DANGER)') }}
        </h2>

        <p class="mt-2 text-sm text-red-400 font-mono animate-pulse">
            {{ __('WARNING: Initiating protocol will result in permanent deletion of all core data, identity strings, and logs. Backup any critical assets before proceeding.') }}
        </p>
        <div class="absolute bottom-0 left-0 h-[1px] w-1/3 bg-red-600 shadow-[0_0_15px_rgba(220,38,38,0.9)]"></div>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-gradient-to-r from-red-600 to-pink-600 hover:from-pink-600 hover:to-red-600 text-white font-bold py-2.5 px-8 rounded-lg shadow-[0_0_15px_rgba(220,38,38,0.6)] transition-all transform hover:scale-105 uppercase tracking-widest text-sm flex items-center gap-2"
    ><i class="fa-solid fa-triangle-exclamation"></i> {{ __('INITIATE PURGE') }}</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8 bg-gray-900 border-2 border-red-500 shadow-[0_0_30px_rgba(220,38,38,0.3)] inset-0">
            @csrf
            @method('delete')

            <h2 class="text-xl font-bold text-red-500 font-mono uppercase tracking-widest flex items-center gap-2">
                <i class="fa-solid fa-skull text-3xl"></i> {{ __('CONFIRM SYSTEM PURGE?') }}
            </h2>

            <p class="mt-4 text-sm text-red-300 font-mono">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your passphrase to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 bg-gray-800 border-red-500/50 text-red-400 placeholder-red-700 focus:border-red-500 focus:ring-red-500 font-mono"
                    placeholder="{{ __('Enter Passphrase to Confirm') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-500 font-bold" />
            </div>

            <div class="mt-8 flex justify-end items-center gap-4">
                <button x-on:click.prevent="$dispatch('close')" class="px-5 py-2.5 bg-gray-800 border border-gray-600 text-gray-400 hover:bg-gray-700 hover:text-white transition duration-300 text-sm font-bold font-mono tracking-widest uppercase rounded">
                    {{ __('ABORT') }}
                </button>

                <button type="submit" class="bg-gradient-to-r from-red-600 to-pink-600 hover:from-pink-600 hover:to-red-600 text-white font-bold py-2.5 px-8 rounded shadow-[0_0_15px_rgba(220,38,38,0.6)] transition-all transform hover:scale-105 uppercase tracking-widest text-sm flex items-center gap-2">
                    <i class="fa-solid fa-fire"></i> {{ __('EXECUTE PURGE') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
