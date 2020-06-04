@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{$user->username}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h2>Edit profile</h2>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">{{ __('Title') }}</label>


                    <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $user->profile->title }}" required>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">{{ __('Description') }}</label>


                    <input id="description" name="description" type="text" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') ?? $user->profile->description }}" required>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label">{{ __('URL') }}</label>


                    <input id="url" name="url" type="text" class="form-control @error('url') is-invalid @enderror" value="{{ old('url') ?? $user->profile->url }}" required>

                    @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">{{ __('Profile image') }}</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @error('image')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="row pt-5">
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </div>


        </div>
    </form>
</div>
@endsection