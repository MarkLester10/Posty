@component('mail::message')
# Your post get a comment &#128513;

{{ $commentator->name }} commented on yout post

@component('mail::button', ['url' => route('posts.show', $post)])
View Post
@endcomponent

Thanks,<br>
Posty
@endcomponent
