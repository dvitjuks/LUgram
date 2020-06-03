@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/logos/lulogo.png" class="rounded-circle" style="height: 150px">
        </div>
        <div class="col-9 pt-5">
            <div>
                <h1>{{$user->username}}</h1>
            </div>
            <div class="d-flex">
                <div class="pr-3"><strong>12</strong> posts</div>
                <div class="pr-3"><strong>23k</strong> followers</div>
                <div class="pr-3"><strong>14</strong> following</div>
            </div>
            <div class="pt-2 font-weight-bold">{{$user->profile->title}}</div>
            <div class="pt-1">{{$user->profile->description}}</div>
            <div class="pt-2"><a href="#">{{$user->profile->url}}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-4">
            <img src="/logos/lulogo.png" class="w-100">
        </div>
        <div class="col-4">
            <img src="/logos/lulogo.png" class="w-100">
        </div>
        <div class="col-4">
            <img src="/logos/lulogo.png" class="w-100">
        </div>
    </div>
</div>
@endsection