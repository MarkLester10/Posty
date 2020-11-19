@extends('layouts.app')


@section('content')
    <div class="container mx-auto py-6">
        <div class="flex justify-center p-3">
            <div class="w-full md:w-4/5 bg-white p-6 rounded-lg">
        @auth
        <form action="{{ route('posts') }}" method="post" class="mb-4">
            @csrf
            <div class="mb-4">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="What's on your mind?"></textarea>
                @error('body')
                <div class="text-red-500 mt-2 text-small">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div>
                <button type="submit" class="bg-green-400 text-white px-4 py-2 rounded font-medium hover:border-green-300 focus:outline-none focus:shadow-outline focus:border-green-300">Post</button>
            </div>
        </form>
        @endauth


            @if($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post"/>
                @endforeach
                {{ $posts->links() }}
            @else
            <p>There are no posts</p>
            @endif
            </div>
        </div>
    </div>
@endsection
