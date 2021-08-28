@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="my-20 mx-2 bg-white flex flex-col justify-center items-center">
    <div class="bg-white w-full md:w-1/4 shadow rounded-md p-5 mx-2">
        <h1 class="text-4xl font-bold mb-2 text-gray-600">Welcome Back!</h1>
        <p class="text-sm text-gray-500">Want to learn something new?</p>
        <hr class="mt-2 mb-2">
        @if (session('status'))
        <div class=" alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('login') }}" method="POST" class="mt-2">
            @csrf
            <input type="email" name="email" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 my-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Email" value="{{ old('email')}}" autofocus />
            @error('email')
            <p class="text-red-600 text-sm font-light">{{ $message }}</p>
            @enderror

            <input type="password" name="password" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 my-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" id="pass" placeholder="Password" />
            @error('password')
            <p class="text-red-600  text-sm font-light">{{ $message }}</p>
            @enderror


            <div class="mt-6">
                <a href="/forgot-password" class="font-medium text-sm text-gray-500 float-right">Forgot Password?</a>
            </div>
            <button type="submit" class="mt-4 text-center w-full bg-gray-700 rounded-md text-white py-3 font-medium hover:bg-gray-600 transition">Login</button>
            <p class="text-sm text-center my-4 text-gray-500">Don't have an account ? <a href="/register" class="underline">Sign Up</a></p>
        </form>
    </div>
</div>

@endsection
