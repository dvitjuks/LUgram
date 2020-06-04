@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/storage/{{$user->profile->image}}" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{$user->username}}</h1>
                @can('update', $user->profile)<a href="/post/create">Add Post</a>@endcan
            </div>
            @can ('update', $user->profile)
            <div><a href="/profile/{{$user->username}}/edit">Edit Profile</a></div>
            @endcan
            <div class="d-flex">
                <div class="pr-3"><strong>{{$user->posts()->count()}}</strong> posts</div>
                <div class="pr-3"><strong>23k</strong> followers</div>
                <div class="pr-3"><strong>14</strong> following</div>
            </div>
            <div class="pt-2 font-weight-bold">{{$user->profile->title}}</div>
            <div class="pt-1">{{$user->profile->description}}</div>
            <div class="pt-2"><a href="#">{{$user->profile->url}}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/post/{{$post->id}}"><img src="/storage/{{$post->image}}" class="w-100"></a>
        </div>
        @endforeach
    </div>
</div>
@endsection