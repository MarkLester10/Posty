@extends('layouts.app')


@section('content')
<div class="container mx-auto py-6">
    <div class="flex justify-center">
        <div class="w-full md:w-5/12 bg-white p-6">
            @if(session('status'))
                <div class="border-2 border-red-700 bg-red-500 text-center text-white p-4 w-full rounded-lg mb-4">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg hover:border-gray-300 focus:outline-none focus:bg-white focus:shadow-outline focus:border-gray-300 @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                    @error('email')
                    <div class="text-red-500 mt-2 text-small">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg hover:border-gray-300 focus:outline-none focus:bg-white focus:shadow-outline focus:border-gray-300 @error('password') border-red-500 @enderror" value="">
                    @error('password')
                    <div class="text-red-500 mt-2 text-small">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                   <div class="flex items-center">
                       <input type="checkbox" name="remember" id="remember" class="mr-2">
                       <label for="remember">Remember me</label>
                   </div>
                </div>
                <div>
                    <button type="submit" class="bg-blue-400 text-white px-4 py-3 rounded font-medium w-full hover:border-green-300 focus:outline-none focus:shadow-outline focus:border-blue-300">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
