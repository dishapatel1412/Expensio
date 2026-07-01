<aside class="w-64 min-h-screen bg-slate-900 text-white flex flex-col">
    <!-- Navigation -->
    <nav class="flex-1 px-4 py-6">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center px-4 py-3 rounded-lg hover:bg-slate-800 transition">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('expenses.index') }}"
                    class="flex items-center px-4 py-3 rounded-lg hover:bg-slate-800 transition">
                    Expenses
                </a>
            </li>

            <li>
                <a href="{{ route('categories.index') }}"
                    class="flex items-center px-4 py-3 rounded-lg hover:bg-slate-800 transition">
                    Categories
                </a>
            </li>
        </ul>
        <div class="my-6 border-t border-slate-800"></div>
        <ul class="space-y-2">
            <li>
                <a href="#"
                    class="flex items-center px-4 py-3 rounded-lg hover:bg-slate-800 transition">
                    Budgets
                </a>
            </li>

            <li>
                <a href="#"
                    class="flex items-center px-4 py-3 rounded-lg hover:bg-slate-800 transition">
                    Reports
                </a>
            </li>
        </ul>
    </nav>
    
    <!-- Bottom -->
    <div class="border-t border-slate-800 p-4">
        <a href="#"
           class="block px-4 py-3 rounded-lg hover:bg-slate-800 transition">
            Settings
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                type="submit"
                class="w-full text-left px-4 py-3 rounded-lg text-red-400 hover:bg-red-500/10 transition"
            >
                Logout
            </button>
        </form>
    </div>
</aside>