<nav class="bg-green-600 text-white border-b border-green-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center space-x-4">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-white" />
                </a>

                <!-- Navigation Links -->
                <a href="{{ route('dashboard') }}"
                   class="text-white font-medium hover:underline">
                    {{ __('Dashboard') }}
                </a>
            </div>

            <!-- Settings / Account Buttons -->
            <div class="flex items-center space-x-4">
                <span class="hidden sm:inline text-white font-medium">{{ Auth::user()->name }}</span>

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
