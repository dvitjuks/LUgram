@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" class="w-100">
        </div>
        <div class="col-4">
            <div class="d-flex align-items-bottom">
                <div>
                    <a href="/profile/{{$post->user->username}}"><img src="/storage/{{$post->user->profile->image}}" class="w-100 rounded-circle" style="height: 40px"></a>
                </div>
                <div class="pl-3">
                    <a href="/profile/{{$post->user->username}}" style="text-decoration:none; color:black">
                        <h2>{{$post->user->username}}</h2>
                    </a>
                </div>
            </div>
            <div class="pt-3" style="font-size: 20px">{{$post->caption}}</div>
        </div>
    </div>
</div>
@endsection