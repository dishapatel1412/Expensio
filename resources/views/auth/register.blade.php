@extends('layouts.guest')

@section('title', 'Register')

@section('content')
    <div class="max-w-sm h-auto mx-auto mt-10 mb-10 p-3 border border-gray-400 rounded">
        <h3 class="text-2xl font-semibold text-center">Register</h3>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="m-3">
                <label 
                    for="name"
                    class="block text-sm font-medium text-gray-700 mb-2"
                >
                    Name:
                </label>
                <input 
                    type="text" 
                    name="name" 
                    id="name"
                    placeholder="Enter Your Name"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                >
            </div>
            <div class="m-3">
                <label 
                    for="username"
                    class="block text-sm font-medium text-gray-700 mb-2"
                >
                    Username:
                </label>
                <input 
                    type="text" 
                    name="username" 
                    id="username"
                    placeholder="Enter Username"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                >
            </div>
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
                    for="mobile_num"
                    class="block text-sm font-medium text-gray-700 mb-2"
                >
                    Mobile Number:
                </label>
                <input 
                    type="tel" 
                    name="mobile_num" 
                    id="mobile_num"
                    placeholder="Enter Mobile Number [Optional]"
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
                    for="password_confirmation"
                    class="block text-sm font-medium text-gray-700 mb-2"
                >
                    Confirm Password:
                </label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    id="password_confirmation"
                    placeholder="Enter Password Again"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                >
            </div>
            <div class="m-3">
                <button
                    type="submit" 
                    class="bg-indigo-600 hover:bg-indigo-700 text-white w-full p-3 rounded"   
                >
                    Register
                </button>
            </div>
            <a 
                class="block text-center underline text-sm text-gray-600 hover:text-gray-900 m-3" 
                href="{{ route('login') }}"
            >
                <span>Already have an account?</span>
            </a>
        </form>
    </div>
@endsection