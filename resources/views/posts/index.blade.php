@extends('layouts.app')

@section('content')
@if($posts->count() == 0)
<div class="d-flex align-items-center justify-content-center container" style="height: 80vh">
    <div class="d-inline">
        <div class="" style="font-size: 45px">
            <strong>Looks like your timeline is empty!</strong>
        </div>
        <div class="container d-flex justify-content-center">
            <div class="d-inline">
                <h3>Here are some users to follow:</h3>
                @foreach(App\User::All() as $user)
                @if($user->id != Auth::user()->id)
                <div class="d-flex justify-content-center align-items-center py-1">
                    <a href="/profile/{{$user->username}}">
                        <img src="/storage/{{$user->profile->image}}" class="rounded-circle w-100" style="max-width: 30px">
                    </a>
                    <a href="/profile/{{$user->username}}" style="text-decoration: none; color:#333">
                        <div class="pl-2"><strong style="font-size: 18px;">{{$user->username}}</strong></div>
                    </a>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@else
<div class="con">
    <div class="col-6 offset-3">
        <div class="d-flex align-items-center justify-content-center" style="font-size: 30px; font-weight: 700; letter-spacing: 3px; text-transform: uppercase">Your timeline:</div>
        <hr style="border-bottom: 1px solid #333">
    </div>
</div>
@foreach($posts as $post)
<div class="container">
    <div class="col-6 offset-3 pt-2">
        <a href="/post/{{$post->id}}"><img src="/storage/{{$post->image}}" class="h-100 w-100" style="max-width: 750px"></a>
    </div>
    <div class="col-6 offset-3">
        <div class="pt-1" style="height: 70px">
            <div class="pt-0 d-flex" style="font-size: 20px"><a href="/profile/{{$post->user->username}}" class="font-weight-bold pr-2" style="text-decoration:none; color:black">
                    {{$post->user->username}}</a> {{$post->caption}}
            </div>
        </div>
        <hr style="border-bottom: 1px solid #333">
    </div>

</div>
@endforeach
<div class="row">
    <div class="col-12 d-flex justify-content-center">
        {{$posts->links()}}
    </div>
</div>
@endif
@endsection