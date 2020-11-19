@extends('layouts.app')


@section('content')
<div class="container mx-auto py-6">
    <div class="flex justify-center p-3">
        <div class="w-full md:w-4/5 bg-white p-3 rounded-lg">
                <div class="p-3">
                    <h1 class="text-4xl font-medium mb-4">{{ $user->name }} <span class="text-gray-600 text-sm">{{ $user->username }}</span> </h1>
                    <p><i class="far fa-sticky-note text-green-500"></i> {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and received <i class="fas fa-heart text-red-500"></i> {{ $user->receivedLikes->count() }} {{ Str::plural('like', $user->receivedLikes->count()) }}</p>
                </div>
                <div class="bg-white p-3 rounded-lg">
                    @if($posts->count())
                        @foreach ($posts as $post)
                            <x-post :post="$post"/>
                        @endforeach
                        {{ $posts->links() }}
                    @else
                    <p>{{ $user->name }} does not have any posts.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
