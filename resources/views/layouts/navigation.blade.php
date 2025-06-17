<nav class="bg-green-600 border-b border-green-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center space-x-4">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-black" />
                </a>

                <!-- Navigation Links -->
                <a href="{{ route('dashboard') }}"
                   class="font-medium hover:underline text-black">
                    {{ __('Dashboard') }}
                </a>
            </div>

            <!-- Settings / Account Buttons -->
            <div class="flex items-center space-x-4">
                <span class="hidden sm:inline font-medium text-black">{{ Auth::user()->name }}</span>

                <a href="{{ route('profile.edit') }}"
                   class="bg-white text-green-700 px-3 py-1 rounded hover:bg-green-100 font-medium">
                    {{ __('Profile') }}
                </a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                            class="bg-white text-green-700 px-3 py-1 rounded hover:bg-green-100 font-medium">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
