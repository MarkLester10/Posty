@props(['post'=>$post])

<div>
    <div class="mb-4 border-2 border-gray-200 p-4">
        <a href="{{ route('user.posts', $post->user) }}" class="font-bold text-xl">{{ $post->user->name }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
        <p class="mb-2">{{ $post->body }}</p>
        <div class="flex items-center">
        @auth
            @if (!$post->likedBy(auth()->user()))
            <form action="{{ route ('posts.like', $post)}}" class="mr-6 inline" method="post">
                @csrf
                <button type="submit" class="text-red-500 text-lg focus:outline-none"><i class="far fa-heart"></i></button>
            </form>
            @else
                <form action="{{ route ('posts.like', $post)}}" class="mr-6 inline" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 text-lg focus:outline-none"><i class="fas fa-heart"></i></button>
                </form>
            @endif

            @can('delete', $post)
            <form action="{{ route ('posts.destroy', $post)}}" class="mr-6 inline" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-gray-600 text-lg focus:outline-none"><i class="far fa-trash-alt"></i></i></button>
            </form>
            @endcan

        @endauth
            <span class="text-gray-500 mr-2">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
            <a href="{{ route('posts.show', $post) }}"><span class="text-gray-500 hover:text-blue-800">{{ $post->comments->count() }} {{ Str::plural('comment', $post->comments->count())}}</span></a>
        </div>
    </div>
</div>

