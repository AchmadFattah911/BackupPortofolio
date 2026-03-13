<section>
    <header class="border-b border-gray-700 pb-4 mb-6 relative">
        <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-indigo-500 uppercase tracking-widest font-mono">
            {{ __('Administrator Data Payload') }}
        </h2>
        
        <p class="mt-2 text-sm text-gray-400 font-mono">
            {{ __("Execute patches to update your core identity string and comms channel (email).") }}
        </p>
        <div class="absolute bottom-0 left-0 h-[1px] w-1/3 bg-cyan-500 shadow-[0_0_10px_rgba(34,211,238,0.8)]"></div>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" class="text-pink-400 font-bold uppercase tracking-wide font-mono mb-2"><i class="fa-solid fa-user-astronaut mr-2"></i>{{ __('Designation (Name)') }}</x-input-label>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full bg-gray-900 border-gray-700 text-cyan-300 focus:border-pink-500 focus:ring-pink-500 font-mono rounded-lg transition-all" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-pink-500" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" class="text-cyan-400 font-bold uppercase tracking-wide font-mono mb-2"><i class="fa-solid fa-envelope-open-text mr-2"></i>{{ __('Comms (Email)') }}</x-input-label>
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full bg-gray-900 border-gray-700 text-pink-300 focus:border-cyan-500 focus:ring-cyan-500 font-mono rounded-lg transition-all" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2 text-red-500" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-4 bg-gray-900 border border-yellow-500/30 rounded-lg">
                    <p class="text-sm text-yellow-500 font-mono animate-pulse">
                        <i class="fa-solid fa-triangle-exclamation mr-1"></i> {{ __('Your comms channel is unverified.') }}

                        <button form="send-verification" class="ml-2 underline hover:text-yellow-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 dark:focus:ring-offset-gray-800 transition-colors">
                            {{ __('Transmit verification signal now.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-bold text-sm text-green-400 font-mono">
                            <i class="fa-solid fa-check mr-1"></i> {{ __('A new verification link has been piped to your comms channel.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-6 pt-4 border-t border-gray-700">
            <button class="bg-gradient-to-r from-cyan-500 to-indigo-500 hover:from-indigo-500 hover:to-cyan-500 text-white font-bold py-2.5 px-8 rounded-lg shadow-[0_0_15px_rgba(34,211,238,0.4)] transition-all transform hover:scale-105 uppercase tracking-widest text-sm flex items-center gap-2">
                <i class="fa-solid fa-floppy-disk"></i> {{ __('Commit Changes') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="text-sm text-cyan-400 font-bold font-mono animate-pulse"
                ><i class="fa-solid fa-check-double mr-1"></i> {{ __('DATA SAVED.') }}</p>
            @endif
        </div>
    </form>
</section>
