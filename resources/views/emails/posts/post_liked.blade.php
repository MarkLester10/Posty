@component('mail::message')
# Your post get a like 	&#10084;

{{ $liker->name }} liked one of yout post.

@component('mail::button', ['url' => route('posts.show',$post)])
View Post
@endcomponent

Thanks,<br>
Posty
@endcomponent
