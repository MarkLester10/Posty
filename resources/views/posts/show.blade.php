@extends('layouts.app')


@section('content')
 <div class="container mx-auto py-6">
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <x-post :post="$post"/>

            <form action="{{ route('posts.comment', $post) }}" method="post" class="mt-4 items-center">
                @csrf
                <div class="text-sm relative">
                    <label for="comment" class="sr-only">Comment</label>
                    <textarea name="comment" id="body" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('comment') border-red-500 @enderror" placeholder="Your Comment"></textarea>
                    <button type="submit" class="absolute top-0 right-0 p-6 focus:outline-none"><i class="fa fa-paper-plane text-green-500"></i></button>
                    @error('comment')
                    <div class="text-red-500 mt-2 text-small">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </form>
            <div class="comment-box border-t-2 border-green-300 mt-3">
                @if($comments->count())
                    @foreach ($comments as $comment)
                    <div class="border-b text-sm p-3 mt-2 rounded-lg">
                        <a href="{{ route('user.posts', $post->user) }}" class="font-bold text-md">{{ $comment->user->name }}</a>
                        <p>{{ $comment->comment }}</p>
                        @auth
                            @can('deleteComment', $comment)
                            <form action="{{ route ('posts.comment', $comment)}}" class="" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 text-sm focus:outline-none"><i class="far fa-trash-alt"></i></i></button>
                            </form>
                            @endcan
                        @endauth
                    </div>
                    @endforeach
                @else
                <div class="border-b text-sm p-3 mt-2 rounded-lg">
                    <p>There are no comments yet.</p>
                </div>
                @endif
            </div>
            {{ $comments->links() }}
        </div>
    </div>
 </div>
@endsection
