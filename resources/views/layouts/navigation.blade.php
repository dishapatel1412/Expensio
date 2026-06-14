<nav class="bg-white border-b border-gray-200">
    <div class="mx-auto flex h-20 items-center justify-between px-6">
        <a href="{{ route('dashboard') }}" class="text-xl font-bold text-indigo-600">
            <h1 class="text-4xl">Expensio</h1>
        </a>
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="text-sm font-medium text-black-600 hover:text-red-700"
                >
                    Logout
                </button>
            </form>
        @endauth
    </div>
</nav>