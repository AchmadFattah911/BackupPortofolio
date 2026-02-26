<x-guest-layout>
    <div class="w-full sm:max-w-md">

        <!-- CARD UTUH -->
        <div
            class="bg-white dark:bg-gray-800
                   shadow-xl rounded-2xl
                   px-6 pt-10"
        >

            <!-- ICON + TEXT -->
            <div class="flex flex-col items-center mb-8">
                <div
                    style="width: 160px; height: 160px;"
                    class="rounded-full
                           flex items-center justify-center
                           ring-8 ring-indigo-500/40"
                >
                    <i
                        class="fa-regular fa-circle-user
                               text-gray-500 dark:text-gray-300"
                        style="font-size: 110px;"
                    ></i>
                </div>

                <!-- TEXT LOGIN (LEBIH GEDE + RAPET) -->
                <h2
                    class="mt-2 text-3xl font-semibold tracking-wide
                           text-gray-700 dark:text-gray-200"
                >
                    Login
                </h2>
            </div>

            <!-- FORM -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- EMAIL -->
                <div>
                    <x-input-label for="email" value="Email" />
                    <x-text-input
                        id="email"
                        class="mt-1 block w-full"
                        type="email"
                        name="email"
                        required
                        autofocus
                    />
                </div>

                <!-- PASSWORD -->
                <div class="mt-4">
                    <x-input-label for="password" value="Password" />
                    <x-text-input
                        id="password"
                        class="mt-1 block w-full"
                        type="password"
                        name="password"
                        required
                    />
                </div>

                <!-- REMEMBER + BUTTON -->
                <div class="mt-6 flex items-center justify-between">
                    <label class="flex items-center">
                        <input
                            type="checkbox"
                            name="remember"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm"
                        >
                        <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">
                            Remember me
                        </span>
                    </label>

                    <x-primary-button>
                        LOG IN
                    </x-primary-button>
                </div>

                <!-- SPACE TAMBAHAN -->
                <div class="h-10"></div>
            </form>

        </div>
    </div>
</x-guest-layout>
