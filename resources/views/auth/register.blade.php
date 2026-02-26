<x-guest-layout>
    <div class="w-full sm:max-w-md">

        <!-- CARD UTUH -->
        <div
            class="bg-white dark:bg-gray-800
                   shadow-xl rounded-2xl
                   px-6 pt-10"
        >

            <!-- ICON + TITLE -->
            <div class="flex flex-col items-center mb-8">
                <div
                    style="width: 140px; height: 140px;"
                    class="rounded-full
                           flex items-center justify-center
                           ring-8 ring-indigo-500/40"
                >
                    <i
                        class="fa-regular fa-circle-user
                               text-gray-500 dark:text-gray-300"
                        style="font-size: 95px;"
                    ></i>
                </div>

                <h2
                    class="mt-2 text-3xl font-semibold tracking-wide
                           text-gray-700 dark:text-gray-200"
                >
                    Register
                </h2>
            </div>

            <!-- FORM -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- NAME -->
                <div>
                    <x-input-label for="name" value="Name" />
                    <x-text-input
                        id="name"
                        class="mt-1 block w-full"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required
                        autofocus
                    />
                </div>

                <!-- EMAIL -->
                <div class="mt-4">
                    <x-input-label for="email" value="Email" />
                    <x-text-input
                        id="email"
                        class="mt-1 block w-full"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
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

                <!-- CONFIRM PASSWORD -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" value="Confirm Password" />
                    <x-text-input
                        id="password_confirmation"
                        class="mt-1 block w-full"
                        type="password"
                        name="password_confirmation"
                        required
                    />
                </div>

                <!-- LINK + BUTTON -->
                <div class="mt-6 flex items-center justify-between">
                    <a
                        href="{{ route('login') }}"
                        class="text-sm underline text-gray-500 hover:text-gray-700 dark:text-gray-400"
                    >
                        Already registered?
                    </a>

                    <x-primary-button>
                        REGISTER
                    </x-primary-button>
                </div>

                <!-- SPACE BAWAH -->
                <div class="h-10"></div>
            </form>

        </div>
    </div>
</x-guest-layout>
