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
                    <a href="/profile/{{$post->user->username}}"><img src="/storage/{{$post->user->profile->image}}" class="w-100 rounded-circle" style="height: 40px"></a>
                </div>
                <div class="pl-3">
                    <a href="/profile/{{$post->user->username}}" style="text-decoration:none; color:black">
                        <h2>{{$post->user->username}}</h2>
                    </a>
                </div>
                <div>
                    <follow-button user-id="{{$post->user->id}}" follows="{{$follows}}"></follow-button>
                </div>
            </div>
            <hr>
            <div style="height: 500px">
                <div class="pt-1 d-flex" style="font-size: 20px"><a href="/profile/{{$post->user->username}}" class="font-weight-bold pr-2" style="text-decoration:none; color:black">
                        {{$post->user->username}}</a> {{$post->caption}}
                </div>
            </div>

            <!--    <div class="col-12">
                <div class="widget-area no-padding blank">
                    <div class="status-upload">
                        <form>
                            <div class="form-group">
                                <textarea placeholder="Add your comment here" class="form-control" id="comment" rows="3"></textarea>
                                <button type="submit" class="btn btn-primary mt-2"><i class="fa fa-share"></i>Add comment</button>
                            </div>
                        </form>
                    </div>
                </div>
        -->
        </div>
    </div>
</div>
</div>
@endsection