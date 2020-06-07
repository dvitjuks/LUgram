@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-center align-items-center">
    <div class="d-inline">
        <div class="pb-4" style="font-weight: 600; font-size: 30px"><a href="/profile/{{$main->username}}" style="text-decoration: none; color: black">{{$main->username}}'s</a> followers:</div>
        <div class="d-inline">
            @foreach($followers as $user)
            <div class="d-flex justify-content-center align-items-center py-2">
                <a href="/profile/{{$user->username}}">
                    <img src="/storage/{{$user->profile->image}}" class="rounded-circle w-100" style="max-width: 60px">
                </a>
                <a href="/profile/{{$user->username}}" style="text-decoration: none; color:#333">
                    <div class="pl-3"><strong style="font-size: 25px;">{{$user->username}}</strong></div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection