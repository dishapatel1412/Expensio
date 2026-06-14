@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <div class="max-w-sm h-auto mx-auto mt-10 p-3 border border-gray-400 rounded">
        <h3 class="text-2xl font-semibold text-center">Login</h3>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="m-3">
                <label 
                    for="email"
                    class="block text-sm font-medium text-gray-700 mb-2"
                >
                    Email:
                </label>
                <input 
                    type="email" 
                    name="email" 
                    id="email"
                    placeholder="Enter Email Address"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                >
            </div>
            <div class="m-3">
                <label 
                    for="password"
                    class="block text-sm font-medium text-gray-700 mb-2"
                >
                    Password:
                </label>
                <input 
                    type="password" 
                    name="password" 
                    id="password"
                    placeholder="Enter Password"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                >
            </div>
            <div class="m-3">
                <label 
                    for="remember_me" 
                    class="inline-flex items-center"
                >
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" 
                        name="remember"
                    >
                    <span 
                        class="ms-2 text-sm text-gray-600"
                    >
                        Remember Me
                    </span>
                </label>
            </div>
            <div class="m-3">
                <button
                    type="submit" 
                    class="bg-indigo-600 hover:bg-indigo-700 text-white w-full p-3 rounded"   
                >
                    Login
                </button>
            </div>
            <a 
                class="block text-center underline text-sm text-gray-600 hover:text-gray-900 m-3" 
                href="{{ route('register') }}"
            >
                <span>Create a new account </span>
            </a>
        </form>
    </div>
@endsection