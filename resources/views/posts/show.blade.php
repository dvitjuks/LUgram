@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" class="w-100">
        </div>
        <div class="col-4">
            <div class="d-flex align-items-center">
                <div>
                    <a href="/profile/{{$post->user->username}}"><img src="/storage/{{$post->user->profile->image}}" class="h-100 rounded-circle" style="max-height: 40px"></a>
                </div>
                <div class="pl-3">
                    <a href="/profile/{{$post->user->username}}" style="text-decoration:none; color:black">
                        <h2>{{$post->user->username}}</h2>
                    </a>
                </div>
                <div>
                    @if (Auth::check() && Auth::user()->username != $post->user->username)
                    <follow-button user-id="{{$post->user->id}}" follows="{{$follows}}"></follow-button>
                    @else
                    @endif
                </div>
            </div>
            <hr>
            <div data-simplebar class="overflow-auto" style="height: 470px">
                <div class="py-1 d-flex" style="font-size: 20px"><a href="/profile/{{$post->user->username}}" class="font-weight-bold pr-2" style="text-decoration:none; color:black">
                        {{$post->user->username}}</a> {{$post->caption}}
                </div>
                @foreach($post->comments as $comment)
                <div class="pt-1 d-flex" style="font-size: 18px"><a href="/profile/{{$comment->username}}" class="font-weight-bold pr-2" style="text-decoration:none; color:black">
                        {{$comment->username}}</a> {{$comment->text}}
                </div>
                @endforeach
            </div>
            <hr>
            <div class="pt-1 col-12">
                <div class="widget-area no-padding blank">
                    <div class="status-upload">
                        <form action="/post/{{$post->id}}/comment" method="POST" id="commentForm">
                            @csrf
                            <div class="form-group">
                                <textarea form="commentForm" placeholder="Add your comment here" class="form-control" id="comment" name="comment" rows="2"></textarea>
                                <button type="submit" class="btn btn-primary mt-2"><i class="fa fa-share"></i>Add comment</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection